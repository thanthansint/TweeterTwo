<template>
    <div class="footer white-text"><p class="vertical">Copyright: 2010</p></div>
</template>

<script>
export default {
  name: 'Footer'
}
</script>

<style scoped>
    .footer {
        position: relative;
        top: 0;
        height : 15vh;
        font-size: 20px;
        background-color: #c2185b;        
    }
    .vertical{
        position: absolute;
        top: 5vh;
        left: 25vw;
    }
</style>
