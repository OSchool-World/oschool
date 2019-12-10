<template>
    <os-page>
        <os-section class="col-12">
            <div class="row justify-content-center align-content-center">
                <div class="col-12 image"></div>
                <div class="col-12 text">صفحه مورد نظر یافت نشد!</div>
            </div>
        </os-section>
    </os-page>
</template>

<script>
    export default {
        name: "NotFound404"
    }
</script>

<style scoped>
    div.image {
        background-image: url("/images/not-found.png");
        background-position: center center;
        background-size: contain;
        height: 500px;
        background-repeat: no-repeat;
    }

    div.text {
        text-align: center;
        font-size: 20px;
        font-weight: bold;
    }
</style>
