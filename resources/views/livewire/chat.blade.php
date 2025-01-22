<!-- Di view Blade -->
<div
    class="fixed bottom-0 end-0 w-96"
    style="z-index: 50;"
>
    <div class="bg-white dark:bg-gray-800 shadow-md rounded-t-lg mx-4">
        <!-- Header Chat -->
        <div class="flex justify-between items-center p-4 border-b border-gray-200 dark:border-gray-700">
            <h3 class="text-lg font-semibold">Live Chat</h3>
            <button
                wire:click="$emit('toggleChat')"
                class="text-gray-500 hover:text-red-500 text-xl font-bold"
            >
                &times;
            </button>
        </div>

        <!-- Area Messages -->
        <div class="max-h-64 overflow-y-auto p-4">
            <div class="p-3 mb-2 bg-gray-100 dark:bg-gray-700 rounded">
                <div class="flex items-center gap-2 mb-1">
                    <span class="font-bold">saas</span>
                    <span class="text-sm text-gray-500">ss/span</span>
                </div>
                <p class="text-gray-800 dark:text-gray-200">ss</p>
            </div>
        </div>

        <!-- Form Input -->
        <form wire:submit.prevent="sendMessage" class="p-4 border-t border-gray-200 dark:border-gray-700">
            <input
                type="text"
                wire:model="newMessage"
                class="w-full p-2 mb-2 border border-gray-300 dark:border-gray-600 rounded focus:ring-2 focus:ring-blue-500 dark:bg-gray-700"
                placeholder="Type a message..."
            >
            <button
                type="submit"
                class="w-full bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded transition-colors"
            >
                Send
            </button>
        </form>
    </div>
</div>
