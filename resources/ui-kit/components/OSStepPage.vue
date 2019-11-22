<template>
    <div class="os-step-page">
        <slot></slot>
    </div>
</template>

<script>
    export default {
        name: "OSStepPage",
        props: {
            name: {
                type: String
            }
        },
    }
</script>

<style scoped>

</style>