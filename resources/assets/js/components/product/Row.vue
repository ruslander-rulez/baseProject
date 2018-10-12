<template>
    <tr role="row">
        <td>
          {{ product.id }}
        </td>
        <td> {{ product.title}}</td>
        <td>
          {{ product.locale }}
        </td>
        <td>
            {{ product.slug }}
        </td>
        <td>
            <button class="bnt btn-md btn-default" v-on:click="editPopup=true"><i class="fa fa-edit"></i></button>

            <product-edit v-if="editPopup" v-on:close="editPopup=false" :inputProduct="product" v-on:updated="updated">
            </product-edit>


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
                product: {},
                showDeleteWarning: false,
                editPopup: false
            }
        },
        mounted() {
            this.product = this.inputProduct
        },
        name: "Row",
        props: ['inputProduct'],
        methods: {
            updated: function (product) {
                this.product = product;
                this.$emit("message", "Товар был обновлен")
            },
            deleteItem: function () {
                this.showDeleteWarning = false
                window.HTTP.delete("/product",{params: {
                    "id" : this.product.id
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