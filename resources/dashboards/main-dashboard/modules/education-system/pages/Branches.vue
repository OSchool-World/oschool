<template>
    <os-page>
        <os-section class="col-9" caption="شعب موسسه">
            <os-datagrid :columns="datagrid_columns" :data="branches" :row-dropdown-items="datagrid_dropdown_items"></os-datagrid>
        </os-section>
        <os-section class="col-3">
            <os-input type="text" label="نام شعبه" v-model="branch.name"></os-input>
            <os-textarea label="آدرس" v-model="branch.address"></os-textarea>
            <button class="os-btn" @click="saveBranch">{{ branch.id ? 'ویرایش' : 'افزودن' }}</button>
            <button class="os-btn white" @click="claerBranch" v-if="branch.id">انصراف</button>
        </os-section>
    </os-page>
</template>

<script>
    export default {
        name: "Branches",
        data() {
            return {
                datagrid_columns: {
                    name: "نام شعبه",
                    address: "آدرس"
                },
                datagrid_dropdown_items: [
                    {
                        icon: 'edit',
                        title: 'ویرایش',
                        callback: this.editBranch
                    }
                ],
                branches: [],
                empty_branch: {
                    id: null,
                    name: null,
                    address: null
                },
                branch: {
                    id: null,
                    name: null,
                    address: null
                }
            }
        },
        methods: {
            editBranch(item) {
                this.branch = {...item};
            },
            claerBranch() {
                this.branch = {...this.empty_branch};
            },
            saveBranch() {
                this.axios.post("/education_system/branches", this.branch)
                    .then(response => {
                        this.claerBranch();
                        this.getBranches();
                    })
                    .catch(error => {
                        console.log(error);
                    });
            },
            getBranches() {
                this.axios.get("/education_system/branches")
                    .then(response => {
                        this.branches = response.data;
                    })
                    .catch(error => {
                        console.log(error);
                    });
            }
        },
        created() {
            this.getBranches();
        }
    }
</script>

<style scoped>

</style>
