<template>
    <div class="os-tab-page" v-if="isActive">
        <slot></slot>
    </div>
</template>

<script>
    export default {
        name: "OSTabPage",
        props: {
            title: {
                type: String,
                required: true
            },
            id: {
                type: [String, Number],
            },
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
