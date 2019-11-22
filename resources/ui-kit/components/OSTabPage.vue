<template>
    <div class="os-tab-page" v-if="isActive">
        <slot></slot>
    </div>
</template>

<script>
    export default {
        name: "OSTabPage",
        props: {
            name: {
                type: String,
                required: true
            }
        },
        data() {
            return {
                isActive: false
            }
        },
    }
</script>

<style scoped>

</style>