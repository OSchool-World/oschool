<template>
    <os-page>
        <os-section class="col-12" caption="نظام‌های آموزشی">
            <os-tab :click-add-button="addNewEducationSystem" v-model="selected_education_system_id">
                <os-tab-page v-for="education_system in education_systems" :title="education_system.title" :key="education_system.id" :id="education_system.id">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-4">
                                <div class="row no-gutters align-items-end justify-content-around">
                                    <os-input v-model="grade.title" class="col" type="text" label="نام پایه جدید"></os-input>
                                    <button class="os-btn no-margin no-min-width add-btn" @click="addNewGrade">{{ grade.id ? '&#x2714' : '+' }}</button>
                                    <button class="os-btn no-margin no-min-width add-btn white" @click="cancelEditGrade" v-if="grade.id">×</button>
                                </div>
                                <div class="row no-gutters">
                                    <os-listbox class="col-12" label="پایه‌ها" :items="education_system.grades" text="title" with-delete with-edit @clickDeleteItem="deleteGradeItem" @clickEditItem="editGradeItem" min-height="300px"></os-listbox>
                                </div>
                                <br>
                            </div>
                            <div class="col-8" style="border-right: solid 1px #CFD5D9">
                                <div class="row align-items-end">
                                    <div class="col-5">
                                        <os-listbox label="پایه‌ها" :items="source_grades" text="title" multiple min-height="300px" v-model="selected_source_grades"></os-listbox>
                                    </div>
                                    <div class="col-2 align-self-center">
                                        <button class="os-btn col-12" :disabled="!selected_grade_group" @click="addSelectedGradesIntoGroup"> >> </button>
                                        <button class="os-btn col-12" :disabled="!selected_grade_group" @click="removeSelectedGradesFromGroup"> << </button>
                                    </div>
                                    <div class="col-5">
                                        <os-select label="گروه" :items="selected_education_system.grade_groups" text="title" v-model="selected_grade_group"></os-select>
                                        <os-listbox label="پایه‌های این گروه" :items="grades_of_selected_grade_group" text="title" multiple min-height="300px" v-model="selected_destination_grades"></os-listbox>
                                    </div>
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                </os-tab-page>
            </os-tab>
        </os-section>
    </os-page>
</template>

<script>
    export default {
        name: "EducationSystems",
        data() {
            return {
                education_systems: null,
                empty_grade: {
                    id: null,
                    title: null
                },
                grade: {
                    id: null,
                    title: null
                },
                selected_education_system_id: null,
                selected_grade_group: null,
                selected_source_grades: [],
                selected_destination_grades: [],
                grades_of_selected_grade_group: []
            }
        },
        computed: {
            selected_education_system() {
                var selected_education_system = this.education_systems.find((item) => {
                    if(item.id == this.selected_education_system_id)
                        return item;
                });

                return selected_education_system;
            },
            source_grades() {
                if(this.selected_education_system)
                    return this.selected_education_system.grades.filter(item => !this.grades_of_selected_grade_group.find(item2 => item2.id == item.id));

                return null;
            }
        },
        watch: {
            selected_grade_group() {
                this.getGradesOfSelectedGradeGroup();
                this.deselectAllGradeGroups();
            },
            selected_education_system_id() {
                this.selected_grade_group = null;
                this.grades_of_selected_grade_group = [];
            }
        },
        methods: {
            addNewEducationSystem() {
                var educationSystemTitle = prompt("عنوان نظام آموزشی جدید");
                if(educationSystemTitle)
                    this.axios.post('/education_system/education_systems', {id: null, title: educationSystemTitle})
                        .then(response => {
                            this.getEducationSystems();
                        })
                        .then(error => {
                            console.log(error);
                        });
            },
            addNewGrade() {
                if(this.grade.title)
                    this.axios.post('/education_system/education_systems/' + this.selected_education_system_id + '/grades', this.grade)
                        .then(response => {
                            this.grade = {...this.empty_grade};
                            this.getEducationSystems();
                        })
                        .then(error => {
                            console.log(error);
                        });
            },
            deleteGradeItem(item) {
                //TODO Show prompt before delete.
                this.axios.delete('/education_system/education_systems/' + this.selected_education_system_id + '/grades/' + item.id)
                    .then(response => {
                        this.getEducationSystems();
                    })
                    .then(error => {
                        console.log(error);
                    });
            },
            editGradeItem(item) {
                this.grade = {...item};
            },
            cancelEditGrade() {
                this.grade = {...this.empty_grade};
            },
            getEducationSystems() {
                this.axios.get('/education_system/education_systems')
                    .then(response => {
                        this.education_systems = response.data;
                        if(!this.selected_education_system_id && response.data.length > 0) {
                            this.selected_education_system_id = response.data[0].id;
                        }
                    })
                    .then(error => {
                        console.log(error);
                    });
            },
            addSelectedGradesIntoGroup() {
                if(this.selected_source_grades.length <= 0)
                    return;

                let url = '/education_system/education_systems/' + this.selected_education_system_id
                    + '/grade_groups/' + this.selected_grade_group.id
                    + '/grades';

                let data = {
                    ids: this.selected_source_grades.map((item) => item.id)
                }

                this.axios.post(url, data)
                    .then(response => {
                        this.getGradesOfSelectedGradeGroup();
                        this.deselectAllGradeGroups();
                    })
                    .then(error => {
                        console.log(error);
                    })
            },
            removeSelectedGradesFromGroup() {
                if(this.selected_destination_grades.length <= 0)
                    return;

                let url = '/education_system/education_systems/' + this.selected_education_system_id
                    + '/grade_groups/' + this.selected_grade_group.id
                    + '/grades';

                let data = {
                    ids: this.selected_destination_grades.map((item) => item.id)
                }

                this.axios.delete(url,{ data: data })
                    .then(response => {
                        this.getGradesOfSelectedGradeGroup();
                        this.deselectAllGradeGroups();
                    })
                    .then(error => {
                        console.log(error);
                    })
            },
            getGradesOfSelectedGradeGroup() {
                if(!this.selected_grade_group)
                    return;

                let url = '/education_system/education_systems/' + this.selected_education_system_id
                    + '/grade_groups/' + this.selected_grade_group.id
                    + '/grades';

                this.axios.get(url)
                    .then(response => {
                        this.grades_of_selected_grade_group = response.data;
                    })
                    .then(error => {
                        console.log(error);
                    });
            },
            deselectAllGradeGroups() {
                this.selected_source_grades.splice(0, this.selected_source_grades.length);
                this.selected_destination_grades.splice(0, this.selected_destination_grades.length);
            }
        },
        created() {
            this.getEducationSystems();
        }
    }
</script>

<style scoped>
    .add-btn {
        width: 38px;
        font-size: 24px;
    }
</style>
