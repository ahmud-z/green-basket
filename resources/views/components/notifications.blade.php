<!-- Notifications -->
<div x-data="{
            notifications: [],
            displayDuration: 8000,

            addNotification({ variant = 'info', title = null, message = null}) {
                const id = Date.now()
                const notification = { id, variant, title, message }

                // Keep only the most recent 20 notifications
                if (this.notifications.length >= 20) {
                    this.notifications.splice(0, this.notifications.length - 19)
                }

                // Add the new notification to the notifications stack
                this.notifications.push(notification)

            },
            removeNotification(id) {
                setTimeout(() => {
                    this.notifications = this.notifications.filter(
                        (notification) => notification.id !== id,
                    )
                }, 400);
            },
        }" x-on:notify.window="addNotification({
                variant: $event.detail.variant,
                title: $event.detail.title,
                message: $event.detail.message,
    })">
    <div x-on:mouseenter="$dispatch('pause-auto-dismiss')"
         x-on:mouseleave="$dispatch('resume-auto-dismiss')"
         class="group pointer-events-none fixed inset-x-8 top-0 z-99 flex max-w-full flex-col gap-2 bg-transparent px-6 py-6 md:bottom-0 md:left-[unset] md:right-0 md:top-[unset] md:max-w-sm">
        <template x-for="(notification, index) in notifications"
                  x-bind:key="notification.id">
            <!-- root div holds all of the notifications  -->
            <div>
                <!-- Info Notification  -->
                <template x-if="notification.variant === 'info'">
                    <div x-data="{ isVisible: false, timeout: null }"
                         x-cloak
                         x-show="isVisible"
                         class="pointer-events-auto relative rounded-sm border border-sky-500 bg-white text-neutral-600 dark:bg-neutral-950 dark:text-neutral-300"
                         x-on:pause-auto-dismiss.window="clearTimeout(timeout)"
                         x-on:resume-auto-dismiss.window=" timeout = setTimeout(() => {(isVisible = false), removeNotification(notification.id) }, displayDuration)"
                         x-init="$nextTick(() => { isVisible = true }), (timeout = setTimeout(() => { isVisible = false, removeNotification(notification.id)}, displayDuration))"
                         x-transition:enter="transition duration-300 ease-out"
                         x-transition:enter-end="translate-y-0"
                         x-transition:enter-start="translate-y-8"
                         x-transition:leave="transition duration-300 ease-in"
                         x-transition:leave-end="-translate-x-24 opacity-0 md:translate-x-24"
                         x-transition:leave-start="translate-x-0 opacity-100"
                         role="status"
                         aria-live="polite"
                         aria-atomic="true" >
                        <div class="flex w-full items-center gap-2.5 bg-sky-500/10 rounded-sm p-4 transition-all duration-300">

                            <!-- Icon -->
                            <div class="rounded-full bg-sky-500/15 p-0.5 text-sky-500" aria-hidden="true">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 1 1-16 0 8 8 0 0 1 16 0Zm-7-4a1 1 0 1 1-2 0 1 1 0 0 1 2 0ZM9 9a.75.75 0 0 0 0 1.5h.253a.25.25 0 0 1 .244.304l-.459 2.066A1.75 1.75 0 0 0 10.747 15H11a.75.75 0 0 0 0-1.5h-.253a.25.25 0 0 1-.244-.304l.459-2.066A1.75 1.75 0 0 0 9.253 9H9Z" clip-rule="evenodd" />
                                </svg>
                            </div>

                            <!-- Title & Message -->
                            <div class="flex flex-col gap-2">
                                <h3 x-cloak
                                    x-show="notification.title"
                                    class="text-sm font-semibold text-sky-500"
                                    x-text="notification.title"></h3>

                                <p x-cloak
                                   x-show="notification.message"
                                   class="text-pretty text-sm"
                                   x-text="notification.message"></p>
                            </div>

                            <!--Dismiss Button -->
                            <button type="button"
                                    class="ml-auto"
                                    aria-label="dismiss notification"
                                    x-on:click="(isVisible = false), removeNotification(notification.id)">
                                <svg xmlns="http://www.w3.org/2000/svg viewBox="0 0 24 24 stroke="currentColor" fill="none" stroke-width="2" class="size-5 shrink-0" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </template>
            </div>
        </template>
    </div>
</div>
