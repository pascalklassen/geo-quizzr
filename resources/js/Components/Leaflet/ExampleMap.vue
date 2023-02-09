<template>
    <div id="map" ref="element"></div>
</template>

<script setup>
import { ref, onMounted } from 'vue';

const element = ref();

onMounted(() => {
    const instance = L.map(element.value)
        .setView([51.505, -0.09], 13);

    const layer = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    });

    layer.addTo(instance);
})
</script>

<style scoped>
#map {
    height: 100vh;
}
</style>
