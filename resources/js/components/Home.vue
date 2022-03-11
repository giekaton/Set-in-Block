<template>
    <div class="home home-content">
        <reader-input />

        <div style="height:100px;"></div>

        <home-info />
    </div>
</template>
<script>
import ReaderInput from './ReaderInput.vue';
import HomeInfo from './HomeInfo.vue';

export default {
    components: {
        ReaderInput,
        HomeInfo,
    },
    setup: () => ({
        // greeting: 'Hello World from Vue 3!'
    })
}
</script>