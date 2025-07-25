<template>
    <div class="w-96 bg-[#181818] h-screen p-5 flex flex-col gap-5">
        <ul
            class="p-4 h-52 bg-[#0d0d0d] shrink-0 overflow-y-scroll overflow-x-hidden flex flex-col gap-2 scrollbar scrollbar-thumb-gray-300 scrollbar-track-tranperent">
            <li v-for="i in 10">
                <span class="font-medium">LongNguyen</span> vừa đăng video.
            </li>
        </ul>
        <div class="flex flex-col justify-between grow">
            <ul
                class="flex flex-col gap-4 overflow-y-scroll h-[640px] overflow-x-hidden scrollbar scrollbar-thumb-gray-300 scrollbar-track-tranperent">
                <li v-for="i in 50" class="flex gap-2 items-center">
                    <img src="../../../public/assets/images/user-pro-img.png" alt="" class="h-12">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </li>
            </ul>
            <div class="flex gap-2 items-center justify-between">
                <input class="outline-none" type="text" placeholder="Bạn muốn nói gì?" name="comment">
                <button class="cursor-pointer hover:opacity-75">
                    <i class="fa fa-paper-plane"></i>
                </button>
            </div>
        </div>
    </div>
</template>

<script>
export default {

}
</script>