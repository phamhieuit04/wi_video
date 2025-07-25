<script setup>
import InfoComponent from '../Components/InfoComponent.vue';
import ContentComponent from '../Components/ContentComponent.vue';
import ChatComponent from '../Components/ChatComponent.vue';
</script>

<template>
    <div class="flex items-center justify-center bg-white dark:bg-black text-black dark:text-white h-screen">
        <InfoComponent />
        <ContentComponent />
        <ChatComponent />
    </div>
</template>