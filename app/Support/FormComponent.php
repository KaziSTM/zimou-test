<?php

namespace App\Support;

use App\Interface\FormsInterface;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use TallStackUi\Traits\Interactions;


/**
 * FormComponent handles various form-related actions such as storing, updating, and managing media attachments.
 *
 * @property ?Model $model The model instance associated with the form.
 * @property string $redirectToCreateRoute The route to redirect to after creating a new resource.
 * @property string $redirectAfterActionRoute The route to redirect to after performing an action.
 * @property bool $updatedAssets Indicates if assets have been updated.
 */
class FormComponent extends Component implements FormsInterface
{

    use Interactions;

    public ?Model $model = null;
    public string $redirectToCreateRoute;
    public string $redirectAfterActionRoute;

    public function remove($data, $value): void
    {
        $id = array_search($value, $this->assets);
        unset($this->assets[$id]);
        $this->deleteMedia($id);

    }


    /**
     * Stores the form data and optionally resets the form.
     *
     * @param  bool  $reset  Determines if the form should be reset after storing.
     * @param  array  $values  Values to retain if the form is reset.
     * @return void
     * @throws Exception
     */
    public function store(bool $reset = false, array $values = []): void
    {
        $this->execute();
        if ($reset) {
            $this->resetExcept($values);
        } else {
            $this->cancel();
        }
    }

    /**
     * Executes the primary form action and handles transactions.
     *
     * @return void
     * @throws Exception
     */
    private function execute(): void
    {
        try {
            DB::beginTransaction();
            $this->save();
            $this->toast()->success(trans('Action saved'), trans('Action was executed successfully'))->send();
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    /**
     * Cancels the form action and redirects to the specified route.
     *
     * @return void
     */
    public function cancel(): void
    {
        $this->redirect(route($this->setRedirectAfterActionRoute()), true);
    }

    /**
     * Sets the route to redirect to after performing an action.
     *
     * @param  string|null  $route  The route to set. If null, the current route is used.
     * @return string The route to redirect to.
     */
    public function setRedirectAfterActionRoute(?string $route = null): string
    {
        $this->redirectAfterActionRoute = $route ?? $this->redirectAfterActionRoute ?? $this->getDefaultRedirectAfterActionRoute();
        return $this->redirectAfterActionRoute;
    }

    /**
     * Gets the default route to redirect to after performing an action.
     *
     * @return string The default route.
     */
    private function getDefaultRedirectAfterActionRoute(): string
    {
        return $this->getBaseRoute().'.index';
    }

    /**
     * Gets the base route name from the current component name.
     *
     * @return string The base route name.
     */
    private function getBaseRoute(): string
    {
        $nameParts = explode('.', $this->getName());

        return $nameParts[2].'.'.$nameParts[3];
    }

    /**
     * Updates the form data by executing the primary action.
     *
     * @return void
     * @throws Exception
     */
    public function update(): void
    {
        $this->execute();
        $this->cancel();
    }

    /**
     * Redirects to the create page route.
     *
     * @return void
     */
    public function redirectToCreatePage(): void
    {
        $this->redirect(route($this->setRedirectToCreateRoute()), true);
    }

    /**
     * Sets the route to redirect to after creating a new resource.
     *
     * @param  string|null  $route  The route to set. If null, the current route is used.
     * @return string The route to redirect to.
     */
    public function setRedirectToCreateRoute(?string $route = null): string
    {
        $this->redirectToCreateRoute = $route ?? $this->redirectToCreateRoute ?? $this->getDefaultRedirectToCreateRoute();
        return $this->redirectToCreateRoute;
    }

    /**
     * Gets the default route to redirect to after creating a new resource.
     *
     * @return string The default route.
     */
    private function getDefaultRedirectToCreateRoute(): string
    {
        return $this->getBaseRoute().'.create';
    }

    public function getCollection(
        string $modelName,
        string $key,
        ?int $userId = null,
        ?callable $conditions = null
    ): Collection {
        return Cache::remember($key, 60, function () use ($modelName, $userId, $conditions) {
            $query = $modelName::select('id', 'name');

            if ($userId) {
                $query->where('user_id', $userId);
            }

            // Apply additional conditions if provided
            if ($conditions) {
                $conditions($query);
            }

            return $query->get()->mapWithKeys(function ($model) {
                return [$model->id => ['id' => $model->id, 'name' => $model->name]];
            });
        });
    }
}

