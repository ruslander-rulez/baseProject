<template>
    <tr role="row">
        <td v-bind:style="background">
          {{ operation.id }}
        </td>
        <td v-if="operation.product !== undefined"> {{ operation.product.name }}({{ operation.product.vendor_code }})</td>
        <td>
          {{ operation.created_at }}
        </td>
        <td>
            <span v-if="operation.stock_type == 'stock'">Склад</span>
            <span v-else>Брак</span>
        </td>
        <td>
            {{ operation.quantity }}
        </td>

        <td>
            {{ operation.old_value }}
        </td>
        <td>
            {{ operation.new_value }}
        </td>
        <td>
            {{ operation.comment }}
        </td>
    </tr>
</template>

<script>

    import {AxiosInstance as HTTP} from "axios";

    export default {
        data() {
            return {
                bufer: {},
                operation: {},
                background: {}
            }
        },
        mounted() {
            this.operation = this.inputOperation
            this.background = {
                background: window.stockOperationTypes[this.inputOperation.operation].color
            }
        },
        name: "Row",
        props: ['inputOperation'],
        methods: {
        }
    }
</script>

<style scoped>

</style>