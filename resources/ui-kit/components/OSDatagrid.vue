<template>
    <div class="os-datagrid">
        <table>
            <tr>
                <th></th>
                <th v-for="(val, key) in columns" :key="key">{{ val }}</th>
            </tr>
            <tr v-for="(row, index) in data" :key="index">
                <td><os-dropdown :items="rowDropdownItems" :callback_args="row"><i class="more"></i></os-dropdown></td>
                <td v-for="(val, key) in columns">{{ row[key] }}</td>
            </tr>
            <tr v-if="!data || data.length <= 0">
                <td :colspan="Object.keys(columns).length + 1" style="text-align: center">اطلاعاتی جهت نمایش وجود ندارد.</td>
            </tr>
        </table>
    </div>
</template>

<script>
    export default {
        name: "OSDatagrid",
        props: {
            data: {
                type: Array,
                default: []
            },
            columns: {
                type: Object,
            },
            rowDropdownItems: {
                type: Array,
                default: []
            }
        },
    }
</script>

<style scoped>

</style>
