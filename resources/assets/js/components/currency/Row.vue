<template>
    <tr
            role="row"
            class="odd"
            v-if="editProcess !== true"
    >
        <td class="sorting_1"> {{ currency.id }}</td>
        <td> {{ currency.code}}</td>
        <td> {{ currency.symbol}}</td>
        <td> {{ currency.countries}}</td>
        <td> {{ currency.delivery}} {{ currency.symbol}}</td>
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

            > <input type="text" class="form-control input-small" :value="currency.id" disabled>         </td>

        <td class="center"  v-bind:class="this.errors['code'] !== undefined ? 'has-error' : ''">
            <input type="text" class="form-control input-small" v-model="currency.code">
        </td>
        <td class="center"  v-bind:class="this.errors['symbol'] !== undefined ? 'has-error' : ''">
            <input type="text" class="form-control input-small" v-model="currency.symbol">
        </td>
        <td class="center"  v-bind:class="this.errors['countries'] !== undefined ? 'has-error' : ''">
            <input type="text" class="form-control input-large" v-model="currency.countries">
        </td>
        <td class="center input-group  input-icon right" v-bind:class="this.errors['delivery'] !== undefined ? 'has-error' : ''">
            <input type="number" step="0.01" min="0" class="form-control input-small" v-model="currency.delivery">
            <span class="input-group-addon">
                {{ currency.symbol }}
            </span>
        </td>
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
                currency: {}
            }
        },
        mounted() {
            if (this.inputCurrency.id === null) {
                this.editProcess = true;
            }
            this.currency = this.inputCurrency
        },
        name: "Row",
        props: ['inputCurrency'],
        methods: {
            save: function (event) {
                this.errors = {};
                if (this.currency.id !== null) {
                    window.HTTP.put("/currency", this.currency).then(response => {
                        if (response.status == 202) {
                            this.editProcess = false;
                            this.$emit("showAlertMessage", "Валюта была обновлена");
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
                    window.HTTP.post("/currency", this.currency).then(response => {
                        if (response.status == 202) {
                            this.editProcess = false;
                        }
                        this.$emit("showAlertMessage", "Валюта была успешно создана");
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
                this.bufer = Object.assign({}, this.currency);

                this.editProcess = true
            },
            cancel: function () {
                this.errors = []
                if (this.currency.id === null) {
                    this.$emit('remove')
                } else {
                    this.currency = Object.assign({}, this.bufer);
                    this.currency = this.bufer;
                    this.editProcess = false
                }
            },
            deleteItem: function () {
                window.HTTP.delete("/currency",{params: {
                    "id" : this.currency.id
                }}).then(response => {

                    this.$emit("showAlertMessage", "Валюта была удалена удлена");
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