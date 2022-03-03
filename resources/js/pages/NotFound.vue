<template>
    <section>
        <div class="container">
            <h2>Error 404: Search is not found </h2>

            <router-link :to="{ name: 'home' }">Go back to Homepage</router-link>
        </div>
    </section>
</template>

<script>
export default {
    name: 'NotFound',
}
</script>