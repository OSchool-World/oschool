<template>
    <div class="os-step-page">
        <slot></slot>
    </div>
</template>

<script>
    export default {
        name: "OSStepPage",
        props: {
            title: {
                type: String
            }
        },
    }
</script>

<style scoped>

</style>