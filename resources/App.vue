<script setup>
import Navbar from './components/Navbar.vue';
</script>

<template>
    <Navbar />
    <div class="container">
        <!-- This is for pages transition, you can simply use <RouterView></RouterView>  -->
        <RouterView v-slot="{ Component }">
            <Transition appear>
                <Component :is="Component" />
            </Transition>
        </RouterView>
    </div>
</template>

<style>
</style>