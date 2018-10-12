<template>
    <tr role="row">
        <td>
          {{ category.id }}
        </td>
        <td> {{ category.title}}</td>
        <td>
          {{ category.locale }}
        </td>
        <td>
            {{ category.slug }}
        </td>
        <td>
            <button class="bnt btn-md btn-default" v-on:click="editPopup=true"><i class="fa fa-edit"></i></button>

            <category-edit v-if="editPopup" v-on:close="editPopup=false" :inputCategory="category" v-on:updated="updated">
            </category-edit>


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
                category: {},
                showDeleteWarning: false,
                editPopup: false
            }
        },
        mounted() {
            this.category = this.inputCategory
        },
        name: "Row",
        props: ['inputCategory'],
        methods: {
            updated: function (category) {
                this.category = category;
                this.$emit("message", "Категория была обновлена")
            },
            deleteItem: function () {
                this.showDeleteWarning = false
                window.HTTP.delete("/category",{params: {
                    "id" : this.category.id
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