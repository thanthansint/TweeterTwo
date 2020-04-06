<template>
    <div class="container">
        <Header/>
        <Footer/>
    </div>
</template>

<script>
import Header from './Header.vue'
import Footer from './Footer.vue'
    export default {
        name: 'Root',
        components: {
            Header,
            Footer
        }
    }
</script>
<style scoped>

</style>
