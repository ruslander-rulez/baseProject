<template>
    <tr
            role="row"
            class="odd"
            v-if="editProcess !== true"
    >
        <td class="sorting_1"> {{ tel.id }}</td>
        <td> {{ tel.telephone }}</td>
        <td> {{ tel.comment}}</td>
        <td>
            <a
                class="edit" href="javascript:;"
                v-on:click="edit"
            > Edit </a>
        </td>
        <td>
            <a class="delete" href="javascript:;" v-on:click="deleteItem"> Delete </a>
        </td>
    </tr>
    <tr
        v-else
    >
        <td
                class="sorting_1"

            > <input type="text" class="form-control input-small" :value="tel.id" disabled>         </td>

        <td class="center"  v-bind:class="this.errors['telephone'] !== undefined ? 'has-error' : ''">
            <input type="text" class="form-control input-small" v-model="tel.telephone"></td>
        <td><input type="text" class="form-control input-small" v-model="tel.comment"></td>
        <td><a class="edit" href="javascript:;" v-on:click="save">Save</a></td>
        <td><a class="cancel" href="javascript:;" v-on:click="cancel">Cancel</a></td>
    </tr>

</template>

<script>

    import {AxiosInstance as HTTP} from "axios";

    export default {
        data() {
            return {
                editProcess: false,
                errors:{},
                bufer: {},
                tel: {}
            }
        },
        mounted() {
            if (this.inputTel.id === null) {
                this.editProcess = true;
            }
            this.tel = this.inputTel
        },
        name: "Row",
        props: ['inputTel'],
        methods: {
            save: function (event) {
                this.errors = {};
                this.tel.telephone = this.tel.telephone.replace(/\D/g, "");
                if (this.tel.id !== null) {
                    window.HTTP.put("/tel-ban", this.tel).then(response => {
                        if (response.status == 202) {
                            this.editProcess = false;
                        }
                    }).catch( e => {
                        let responseErrors = e.response.data.errors;
                        Object.keys(responseErrors).map((item, index2) => {
                                this.errors[item] = responseErrors[item]
                        });
                        this.errors = Object.assign({}, this.errors);
                    });
                }
                else {
                    window.HTTP.post("/tel-ban", this.tel).then(response => {
                        if (response.status == 202) {
                            this.editProcess = false;
                        }
                        this.$emit('updateTable')
                    }).catch( e => {
                        var responseErrors = e.response.data.errors;
                        Object.keys(responseErrors).map((item, index2) => {
                            this.errors[item] = responseErrors[item]
                        })
                        this.errors = Object.assign({}, this.errors);

                    });
                }

            },
            edit: function (event) {
                this.bufer = Object.assign({}, this.tel);

                this.editProcess = true
            },
            cancel: function () {
                this.errors = []
                if (this.tel.id === null) {
                    this.$emit('remove')
                } else {
                    this.tel = Object.assign({}, this.bufer);
                    this.tel = this.bufer;
                    this.editProcess = false
                }
            },
            deleteItem: function () {
                window.HTTP.delete("/tel-ban",{params: {
                    "id" : this.tel.id
                }}).then(response => {
                    this.$emit('updateTable')
                }).catch( e => {
                    console.log(e)
                })
            }
        }
    }
</script>

<style scoped>

</style>