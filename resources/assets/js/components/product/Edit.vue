<template>
    <uiv-modal v-model="showPopup" title="Редактирование товара" size="lg" v-on:hide="close">
        <div class="row">
            <div class="col-md-7">
                <div class="form-group" style="padding-bottom: 30px">
                    <label class="col-md-3 control-label">Название</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" placeholder="Название товара" v-model="product.name" v-bind:class="errors['name'] !== undefined ? 'has-error' : ''">
                        <div v-if="errors['name'] !== undefined">
                            <div v-for="error in errors['name']">
                                <span class="help-block help-block-error">{{ error }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Артикул*</label>
                    <div class="col-md-9" v-bind:class="errors['vendor_code'] !== undefined ? 'has-error' : ''">
                        <input type="text" class="form-control" placeholder="Артикул" v-model="product.vendor_code">
                        <div v-if="errors['vendor_code'] !== undefined">
                            <div v-for="error in errors['vendor_code']">
                                <span class="help-block help-block-error">{{ error }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5" v-if="showPriceBlock">
                <p>ПРАЙС</p>
                <div class="form-group" v-for="(price, index) in product.price">
                    <label class="col-md-3 control-label">{{price.currency.code}}*</label>
                    <div class="col-md-9 input-icon input-icon-lg right" v-bind:class="errors['price.' + index + '.price'] !== undefined ? 'has-error' : ''">
                        <i style="top: -9px;right: 20px;">{{price.currency.symbol}}</i>
                        <input type="number" class="form-control " placeholder="Цена" v-model="price.price" min="1" step="0.01">
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
                showPriceBlock: false,
                product: {},
                currencies: [],
                errors: {},
            }
        },
        name: "editProduct",
        props: ["inputProduct"],
        mounted() {
            this.product = Object.assign({}, this.inputProduct);

            window.currencies.forEach((currency, index, array) => {
                this.currencies[currency.id] = currency
            })

            this.product.price.forEach((priceItem, index) => {
                priceItem.currency = Object.assign({},this.currencies[priceItem.currency_id]);
                delete this.currencies[priceItem.currency_id];
            })
            this.currencies.forEach((currency) => {
                this.product.price.push({
                    price: null,
                    currency: currency,
                    currency_id: currency.id
                })
            })
            this.showPriceBlock = true
        },
        methods: {
            close: function () {
                this.$emit("close")
            },
            save: function (event) {
                this.errors = {};
                if (this.product.id !== null) {
                    window.HTTP.put("/product", this.product).then(response => {
                        if (response.status == 202) {
                            this.$emit("updated", this.product)
                            this.$emit("close")
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
                    window.HTTP.post("/product", this.product).then(response => {
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
                }

            },
        }
    }
</script>

<style scoped>

</style>