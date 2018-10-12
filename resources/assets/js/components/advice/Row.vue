<template>
    <tr role="row">
        <td>
          {{ advice.id }}
        </td>
        <td> {{ advice.title}}</td>
        <td>
          {{ advice.locale }}
        </td>
        <td>
            {{ advice.created_at }}
        </td>
        <td>
            {{ advice.is_publish }}
        </td>
        <td>
            <button class="bnt btn-md btn-default" v-on:click="editPopup=true"><i class="fa fa-edit"></i></button>

            <advice-edit v-if="editPopup" v-on:close="editPopup=false" :inputAdvice="advice" v-on:updated="updated">
            </advice-edit>


            <uiv-popover title="Вы уверены?" trigger="manual" v-model="showDeleteWarning">
                <button class="bnt btn-md btn-danger" v-on:click="showDeleteWarning=true"><i class="fa fa-trash"></i></button>
                <template slot="popover">
                    <button type="button" class="btn green-haze" v-on:click="deleteItem">ДА</button>
                    <button type="button" class="btn red-mint" v-on:click="showDeleteWarning=false">НЕТ</button>
                </template>
            </uiv-popover>
        </td>
    </tr>
</template>

<script>

    import {AxiosInstance as HTTP} from "axios";

    export default {
        data() {
            return {
                bufer: {},
                advice: {},
                showDeleteWarning: false,
                editPopup: false
            }
        },
        mounted() {
            this.advice = this.inputAdvice
        },
        name: "Row",
        props: ['inputAdvice'],
        methods: {
            updated: function (advice) {
                this.advice = advice;
                this.$emit("message", "Совет был обновлен")
            },
            deleteItem: function () {
                this.showDeleteWarning = false
                window.HTTP.delete("/advice",{params: {
                    "id" : this.advice.id
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