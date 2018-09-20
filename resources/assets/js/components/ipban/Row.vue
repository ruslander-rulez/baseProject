<template>
    <tr
            role="row"
            class="odd"
            v-if="editProcess !== true"
    >
        <td class="sorting_1"> {{ ip.id }}</td>
        <td> {{ ip.ip}}</td>
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

            > <input type="text" class="form-control input-small" :value="ip.id" disabled>         </td>

        <td class="center"  v-bind:class="this.errors['ip'] !== undefined ? 'has-error' : ''">
            <input type="text" class="form-control input-small" v-model="ip.ip"></td>
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
                ip: {}
            }
        },
        mounted() {
            if (this.inputIp.id === null) {
                this.editProcess = true;
            }
            this.ip = this.inputIp
        },
        name: "Row",
        props: ['inputIp'],
        methods: {
            save: function (event) {
                this.errors = {};
                if (this.ip.id !== null) {
                    window.HTTP.put("/ip-ban", this.ip).then(response => {
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
                    window.HTTP.post("/ip-ban", this.ip).then(response => {
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
                this.bufer = Object.assign({}, this.ip);

                this.editProcess = true
            },
            cancel: function () {
                this.errors = []
                if (this.ip.id === null) {
                    this.$emit('remove')
                } else {
                    this.ip = Object.assign({}, this.bufer);
                    this.ip = this.bufer;
                    this.editProcess = false
                }
            },
            deleteItem: function () {
                window.HTTP.delete("/ip-ban",{params: {
                    "id" : this.ip.id
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