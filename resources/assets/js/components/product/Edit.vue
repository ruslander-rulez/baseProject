<template>
    <uiv-modal v-model="showPopup" title="Редактирование Товара" size="lg" v-on:hide="close">
        <div class="row">
            <div class="col-md-12">
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-settings"> Товар</i>
                        </div>
                        <ul class="nav nav-tabs">
                            <li v-bind:class="tab === 1 ? 'active' : ''">
                                <a href="#" v-on:click.prevent="tab=1">Основное</a>
                            </li>
                            <li
                                 v-bind:class="tab === 2 ? 'active' : ''"
                            >
                                <a href="#"
                                   v-on:click.prevent="tab=2"
                                >SEO</a>
                            </li>
                            <li
                                 v-bind:class="tab === 3 ? 'active' : ''"
                            >
                                <a href="#"
                                   v-on:click.prevent="tab=3"
                                >Вложения</a>
                            </li>
                            <li
                                 v-bind:class="tab === 4 ? 'active' : ''"
                            >
                                <a href="#"
                                   v-on:click.prevent="tab=4"
                                >Отзывы</a>
                            </li>
                        </ul>
                    </div>
                    <div class="portlet-body">
                        <div class="tab-content">
                            <div class="tab-pane row" v-bind:class="tab === 1 ? 'active' : ''">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-md-5 control-label">Артикул* <br> <small>Должен совпадать с товаром из админки заказов</small></label>
                                        <div class="col-md-7" v-bind:class="errors['vendor_code'] !== undefined ? 'has-error' : ''">
                                            <input type="text" class="form-control" placeholder="Артикул"
                                                   v-model="product.vendor_code">
                                            <error-block v-bind:errors="errors['vendor_code']" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 control-label">Заголовок*</label>
                                        <div class="col-md-10" v-bind:class="errors['title'] !== undefined ? 'has-error' : ''">
                                            <input type="text" class="form-control" placeholder="Заголовок статьи"
                                                   v-model="product.title">
                                            <error-block v-bind:errors="errors['title']" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 control-label">Краткое описание</label>
                                        <div class="col-md-10"
                                             v-bind:class="errors['short_description'] !== undefined ? 'has-error' : ''">
                                            <textarea class="form-control" rows="8" placeholder="Текст"
                                                    v-model="product.short_description"></textarea>
                                            <error-block :errors="errors['short_description']" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 control-label">Описание</label>
                                        <div class="col-md-10"
                                             v-bind:class="errors['description'] !== undefined ? 'has-error' : ''">
                                            <textarea type="text" class="form-control" rows="15" placeholder="Текст"
                                                    v-model="product.description"></textarea>
                                            <error-block :errors="errors['description']" />
                                        </div>
                                    </div>
                                    <div class="form-group row" v-if="categories.length">
                                            <label class="col-md-2 control-label">Категория</label>
                                            <div class="col-md-10"
                                                 v-bind:class="errors['category'] !== undefined ? 'has-error' : ''">
                                                <select v-model="product.category_id" class="form-control">
                                                    <option v-for="category in categories" :value="category.id">
                                                        {{ category.title}} ({{category.locale}})
                                                    </option>
                                                </select>
                                                <error-block :errors="errors['description']" />
                                            </div>
                                        </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="col-md-4 control-label">Локаль*</label>
                                        <div class="col-md-8" v-bind:class="errors['locale'] !== undefined ? 'has-error' : ''">
                                            <input type="text" class="form-control" placeholder="Locale"
                                                   v-model="product.locale">
                                            <error-block v-bind:errors="errors['locale']" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="col-md-4 control-label">Слаг*</label>
                                        <div class="col-md-8" v-bind:class="errors['slug'] !== undefined ? 'has-error' : ''">
                                            <input type="text" class="form-control" placeholder="Slug"
                                                   v-model="product.slug">
                                            <error-block v-bind:errors="errors['slug']"></error-block>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="col-md-8 control-label">Показывать на главной</label>
                                        <div class="col-md-4" v-bind:class="errors['show_on_front'] !== undefined ? 'has-error' : ''">
                                            <toggle-button @change="setShowOnFront"
                                                           :value="!!+product.show_on_front"
                                                           :sync="true"
                                                           :height="30"
                                                           :width="65"
                                                           :labels="{checked: 'ДА', unchecked: 'НЕТ'}"
                                            />
                                            <error-block v-bind:errors="errors['show_on_front']"></error-block>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group row">
                                        <label class="col-md-3 control-label">Сделано в</label>
                                        <div class="col-md-9"
                                             v-bind:class="errors['made_in'] !== undefined ? 'has-error' : ''">
                                            <input type="text" class="form-control" v-model="product.made_in">
                                            <error-block :errors="errors['made_in']" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group row">
                                        <label class="col-md-3 control-label">Made IN ICO</label>
                                        <div class="col-md-9" v-bind:class="errors['thumbnail_id'] !== undefined ? 'has-error' : ''">
                                            <div style="display: inline-block; position: relative" v-if="product.made_in_ico instanceof Object">
                                                <i class="fa fa-close drop" v-on:click="deleteMadeInIco"></i>
                                                <img
                                                        style="max-height: 50px"
                                                        v-bind:src="product.made_in_ico.path"
                                                >
                                            </div>

                                            <dropzone
                                                v-else
                                                v-on:uploadSuccess="icoFileUploaded"
                                                :id="'madeindropzone'"
                                            />
                                            <error-block :errors="errors['thumbnail_id']" />
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane" v-bind:class="tab === 2 ? 'active' : ''">
                                <div class="form-group row">
                                    <label class="col-md-2 control-label">SEO Title</label>
                                    <div class="col-md-10" v-bind:class="errors['seo_title'] !== undefined ? 'has-error' : ''">
                                        <input type="text" class="form-control" placeholder="Seo title"
                                               v-model="product.seo_title">
                                        <error-block :errors="errors['seo_title']" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 control-label">SEO Description</label>
                                    <div class="col-md-10" v-bind:class="errors['seo_description'] !== undefined ? 'has-error' : ''">
                                        <input type="text" class="form-control" placeholder="SEO description"
                                               v-model="product.seo_description">
                                        <error-block :errors="errors['seo_description'] " />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 control-label">SEO Keywords</label>
                                    <div class="col-md-10" v-bind:class="errors['seo_keywords'] !== undefined ? 'has-error' : ''">
                                        <input type="text" class="form-control" placeholder="SEO keywords"
                                               v-model="product.seo_keywords">
                                        <error-block :errors="errors['seo_keywords'] " />
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" v-bind:class="tab === 3 ? 'active' : ''">
                                <div class="form-group row">
                                    <label class="col-md-2 control-label">Thumbnail</label>
                                    <div class="col-md-10" v-bind:class="errors['thumbnail_id'] !== undefined ? 'has-error' : ''">
                                        <div style="display: inline-block; position: relative" v-if="product.thumbnail instanceof Object">
                                            <i class="fa fa-close drop" v-on:click="deleteAttachment"></i>
                                            <img
                                                    style="height: 100px"
                                                    v-bind:src="product.thumbnail.path"
                                            >
                                        </div>

                                        <dropzone v-else v-on:uploadSuccess="fileUploaded"/>
                                        <error-block :errors="errors['thumbnail_id']" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 control-label">Галерея</label>
                                    <div class="col-md-10" v-bind:class="errors['gallery'] !== undefined ? 'has-error' : ''">
                                        <div style="display: inline-block; position: relative; padding: 5px" v-for="(galleryItem, index) in product.gallery">
                                            <i class="fa fa-close drop gallery" v-on:click="product.gallery.splice(index, 1)"></i>
                                            <img
                                                    style="height: 100px"
                                                    v-bind:src="galleryItem.path"
                                            >
                                        </div>

                                        <dropzone
                                                v-on:uploadSuccess="galleryItemUploaded"
                                                :id="'galleryDropzone'"

                                        />
                                        <error-block :errors="errors['gallery']" />
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" v-bind:class="tab === 4 ? 'active' : ''">
                                <review-table />
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
                product: {},
                categories: [],
                errors: {},
                tab: 1
            }
        },
        computed: {
        },
        name: "editProduct",
        props: ["inputProduct"],
        mounted() {
            this.product = Object.assign({}, this.inputProduct);
            HTTP.get("/category/list").then((response) => {
                this.categories = response.data
            })
        },
        methods: {
            setShowOnFront: function($val) {
                this.product.show_on_front = $val.value
            },
            fileUploaded: function(file, request) {
                this.$set(this.product, 'thumbnail', request)
                this.product.thumbnail_id = this.product.thumbnail.id
            },
            icoFileUploaded: function(file, request) {
                this.$set(this.product, "made_in_ico", request)
                this.product.made_in_ico_id = this.product.made_in_ico.id
            },
            galleryItemUploaded: function(file, request) {
                this.product.gallery.push(request)
            },
            deleteAttachment: function() {
                this.$set(this.product, 'thumbnail', null)
                this.product.thumbnail_id = null
            },
            deleteMadeInIco: function() {
                this.$set(this.product, 'made_in_ico', null)
                this.product.made_in_ico_id = null
            },
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
                    }).catch(e => {
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
                    }).catch(e => {
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
    #galleryDropzone:before, #galleryDropzone:after {
        content: "";
        display: block;
        float: none;
    }

    #madeindropzone {
        min-height: auto;
    }
    i.drop {
        position: absolute;
        right: 0px;
        color: red;
        font-size: 25px;
        padding: 10px;
        background: rgba(255,255,255,0.7);
    }
    i.drop.gallery {
        right: 6px;
        top: 6px;
    }
</style>