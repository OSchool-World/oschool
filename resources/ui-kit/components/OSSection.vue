<template>
    <div>
        <section>
            <h2 v-if="caption">{{ caption }}</h2>
            <slot></slot>
        </section>
    </div>
</template>

<script>
    export default {
        name: "OSSection",
        props: {
            caption: {
                type: String,
                default: null
            },
        },
    }
</script>

<style scoped>

</style>
