<template>
    <div class="fixed inset-0 bg-black/75 flex items-center justify-center">
        <div class="bg-white text-black p-5 w-[450px] flex flex-col gap-5 rounded-xl">
            <div class="flex items-center justify-between">
                <h5 class="font-bold text-3xl">
                    Báo cáo vi phạm
                </h5>
                <button type="button" class="hover:opacity-75 cursor-pointer text-2xl" @click="$emit('close_modal')">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div class="flex flex-col gap-1">
                <label>
                    Nội dung báo cáo (*)
                </label>
                <textarea class="w-full rounded-lg outline-2 outline-gray-300 p-2 min-h-20" maxlength="255"></textarea>
            </div>
            <div class="flex gap-3 justify-end">
                <button @click="$emit('close_modal')" type="button"
                    class="cursor-pointer hover:opacity-75">Đóng</button>
                <button type="button"
                    class="bg-red-600 text-white py-2 px-4 rounded-lg hover:opacity-75 cursor-pointer">Gửi báo
                    cáo</button>
            </div>
        </div>
    </div>
</template>