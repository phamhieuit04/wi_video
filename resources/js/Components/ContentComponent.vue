<template>
    <div class="grow h-screen">
        <div class="bg-[#0d0d0d] flex items-center justify-between h-18 px-5">
            <div class="flex gap-4 items-center">
                <h1 class="font-bold text-xl">Người nổi tiếng</h1>
                <button
                    class="bg-red-600 py-2 px-3.5 rounded-md flex items-center gap-2 cursor-pointer hover:opacity-75">
                    <p>Theo dõi</p>
                    <i class="fa fa-heart-circle-plus"></i>
                </button>
            </div>
            <button type="button" class="p-2.5 cursor-pointer hover:opacity-75">
                <img src="../../../public/assets/images/ic_report.png" width="18px" height="18px" alt="">
            </button>
        </div>
        <div class="px-5 flex flex-col items-center justify-center grow">
            <div class="w-[100%]">
                <iframe src="https://drive.google.com/file/d/1ef2x-XxwAtV9EBotpFguoOJoRdjhPHvk/preview" allow="autoplay"
                    class="h-[750px] w-[100%]"></iframe>
                <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Est sit quas
                    quae voluptatibus, ea ex.</p>
            </div>
            <div class="h-12 flex items-center gap-1">
                <button class="bg-red-600 size-10 rounded-sm cursor-pointer hover:opacity-75">
                    <i class="fa-solid fa-angle-left"></i>
                </button>
                <button class="bg-red-600 size-10 rounded-sm cursor-pointer hover:opacity-75">
                    <i class="fa-solid fa-plus"></i>
                </button>
                <button class="bg-red-600 size-10 rounded-sm cursor-pointer hover:opacity-75">
                    <i class="fa-solid fa-angle-right"></i>
                </button>
            </div>
        </div>
    </div>
</template>

<script>
export default {

}
</script>