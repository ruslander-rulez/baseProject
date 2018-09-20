<template>
    <uiv-modal v-model="showPopup" title="Редактирование товара" size="lg" v-on:hide="close">
        <div class="row">
            <div class="col-md-6">
                <div
                    class="form-group"
                    style="padding-bottom: 30px"
                    v-bind:class="errors['product'] !== undefined ? 'has-error' : ''">
                    <label class="col-md-3 control-label">Товар*</label>
                    <div class="col-md-9">
                        <select v-model="operation.product" class="form-control">
                            <option v-for="(product) in products" v-bind:value="product.id">
                                {{ product.name }} ({{ product.vendor_code}})
                            </option>
                        </select>
                        <div v-if="errors['product'] !== undefined">
                            <div v-for="error in errors['product']">
                                <span class="help-block help-block-error">{{ error }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group" style="padding-bottom: 30px"
                     v-bind:class="errors['operation'] !== undefined ? 'has-error' : ''"
                >
                    <label class="col-md-3 control-label">Операция*</label>
                    <div class="col-md-9">
                        <select v-model="operation.operation" class="form-control">
                            <option v-for="(option, index) in stockOperationTypes" v-bind:value="index">
                                {{ option.name }}
                            </option>
                        </select>
                        <div v-if="errors['operation'] !== undefined">
                            <div v-for="error in errors['operation']">
                                <span class="help-block help-block-error">{{ error }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group" style="padding-bottom: 30px"
                     v-bind:class="errors['quantity'] !== undefined ? 'has-error' : ''"
                >
                    <label class="col-md-3 control-label">Количество*</label>
                    <div class="col-md-9">
                        <input class="form-control"
                               type="number" step="1" min="1"
                               v-model="operation.quantity"
                        >
                        <div v-if="errors['quantity'] !== undefined">
                            <div v-for="error in errors['quantity']">
                                <span class="help-block help-block-error">{{ error }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group" style="padding-bottom: 30px"
                     v-bind:class="errors['stock'] !== undefined ? 'has-error' : ''"
                >
                    <label class="col-md-3 control-label">Склад*</label>
                    <div class="col-md-9">
                        <select v-model="operation.stock" class="form-control">
                            <option value="stock">
                                Склад
                            </option>
                            <option value="defect">
                                Брак
                            </option>
                        </select>
                        <div v-if="errors['stock'] !== undefined">
                            <div v-for="error in errors['stock']">
                                <span class="help-block help-block-error">{{ error }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group" style="padding-bottom: 30px"
                     v-bind:class="errors['comment'] !== undefined ? 'has-error' : ''"
                    >
                    <label class="col-md-2 control-label">Коментарий</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" v-model="operation.comment">
                        <div v-if="errors['comment'] !== undefined">
                            <div v-for="error in errors['comment']">
                                <span class="help-block help-block-error">{{ error }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div slot="footer">
            <button class="btn btn-sm green" @click="save">Сохранить <i class="fa fa-save"></i></button>
            <button class="btn btn-sm default" @click="close">Закрыть <i class="fa fa-close"></i></button>
        </div>
    </uiv-modal>
</template>

<script>
    export default {
        data() {
            return {
                showPopup: true,
                operation: {
                    product: null,
                    operation: null,
                    stock: "stock",
                    quantity: 1,
                    comment: ""
                },
                products: [],
                currencies: [],
                errors: {},
                stockOperationTypes: []
            }
        },
        name: "newOperation",
        mounted() {
            this.stockOperationTypes = window.stockOperationTypes;
            window.HTTP.get("/product/list", {params:{ all: 1}}).then((request) => {this.products = request.data})

        },
        methods: {
            close: function () {
                this.$emit("close")
            },
            save: function (event) {
                this.errors = {};
                window.HTTP.post("/stock-operation", this.operation).then(response => {
                    if (response.status == 201) {
                        this.$emit("created")
                        this.$emit("close")
                    }
                }).catch( e => {
                    var responseErrors = e.response.data.errors;
                    Object.keys(responseErrors).map((item, index2) => {
                        this.errors[item] = responseErrors[item]
                    })
                    this.errors = Object.assign({}, this.errors);
                });

            },
        }
    }
</script>

<style scoped>

</style>