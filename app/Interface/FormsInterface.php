<?php

namespace App\Interface;

/**
 * FormsInterface defines the methods required for form-related actions, such as storing, updating, and managing media attachments.
 */
interface FormsInterface
{
    /**
     * Cancels the form action and performs a redirection.
     *
     * @return void
     */
    public function cancel(): void;

    /**
     * Stores the form data and optionally resets the form.
     *
     * @param  bool  $reset  Determines if the form should be reset after storing.
     * @return void
     */
    public function store(bool $reset = false): void;

    /**
     * Updates the form data.
     *
     * @return void
     */
    public function update(): void;


    /**
     * Sets the route to redirect to after performing an action.
     *
     * @param  string|null  $route  The route to set. If null, the current route is used.
     * @return string The route to redirect to.
     */
    public function setRedirectAfterActionRoute(?string $route = null): string;

    /**
     * Sets the route to redirect to after creating a new resource.
     *
     * @param  string|null  $route  The route to set. If null, the current route is used.
     * @return string The route to redirect to.
     */
    public function setRedirectToCreateRoute(?string $route = null): string;
}
