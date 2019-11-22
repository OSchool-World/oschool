<template>
    <div class="os-notification">
        <ul>
            <li v-for="notif in notifications.slice().reverse()">
                <div class="close">X</div>
                <div class="text">{{ notif.text }}</div>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        name: "OSNotification",
        props: {
            notifications: {
                type: Array,
            }
        },
    }
</script>

<style scoped>

</style>