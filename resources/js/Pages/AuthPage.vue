<template>
    <div class="container mx-auto flex h-screen items-center justify-center">
        <div class="flex items-center gap-8">
            <div class="flex w-[650px] flex-col gap-2 text-white">
                <h1 class="text-8xl font-bold text-red-600">Wi Video</h1>
                <p class="text-xl text-black dark:text-white">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Unde dolores doloribus ipsa maiores velit eius alias
                    soluta, ad id non.
                </p>
            </div>
            <div class="flex w-[500px] flex-col gap-12 rounded-2xl bg-white px-6 py-8 outline-2 outline-gray-300">
                <h3 class="text-center text-4xl font-semibold">
                    Đăng nhập
                </h3>
                <div class="flex flex-col gap-3">
                    <button type="button" @click="redirect('facebook')"
                        class="group cursor-pointer flex items-center gap-2 rounded-xl px-4 py-4 outline-2 outline-gray-300 transition-all duration-200 hover:outline-black">
                        <img src="../../../public/assets/images/facebook.png" alt="" class="h-13.5" />
                        <h1 class="text-lg">Tiếp tục với Facebook</h1>
                    </button>
                    <p class="text-center opacity-75">hoặc</p>
                    <button type="button" @click="redirect('google')"
                        class="group cursor-pointer flex items-center gap-2 rounded-xl px-4 py-4 outline-2 outline-gray-300 transition-all duration-200 hover:outline-black"
                        href="">
                        <img src="../../../public/assets/images/google_ico.png" alt="" class="h-13.5" />
                        <h1 class="text-lg">Tiếp tục với Google</h1>
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import api from '../Api/axios';

export default {
    methods: {
        async redirect(provider) {
            await api.get('/auth/' + provider + '/redirect').then((res) => {
                if (res.status == 200) {
                    window.location.href = res.data.data;
                }
            }).catch((err) => {
                console.log(err);
            });
        }
    }
}
</script>