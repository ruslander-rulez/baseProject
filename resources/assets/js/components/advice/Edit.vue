<template>
    <uiv-modal v-model="showPopup" title="Редактирование Совета" size="lg" v-on:hide="close">
        <div class="row">
            <div class="col-md-12">
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-settings"> Совет</i>
                            <toggle-button v-bind:style="{'margin-left': '17px'}"
                                @change="setPublihStatus"
                                :value="publishStatus"
                                :sync="true"
                                :labels="{checked: 'ON', unchecked: 'OFF'}"
                            />
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
                        </ul>
                    </div>
                    <div class="portlet-body">
                        <div class="tab-content">
                            <div class="tab-pane row" v-bind:class="tab === 1 ? 'active' : ''">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-md-2 control-label">Заголовок*</label>
                                        <div class="col-md-10" v-bind:class="errors['title'] !== undefined ? 'has-error' : ''">
                                            <input type="text" class="form-control" placeholder="Заголовок статьи"
                                                   v-model="advice.title">
                                            <div v-if="errors['title'] !== undefined">
                                                <div v-for="error in errors['title']">
                                                    <span class="help-block help-block-error">{{ error }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 control-label">Краткое описание</label>
                                        <div class="col-md-10"
                                             v-bind:class="errors['short_text'] !== undefined ? 'has-error' : ''">
                                            <textarea type="text" class="form-control" placeholder="Краткое описание"
                                                      v-model="advice.short_text"></textarea>
                                            <error-block :errors="errors['short_text']" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 control-label">Текст совета</label>
                                        <div class="col-md-10"
                                             v-bind:class="errors['full_text'] !== undefined ? 'has-error' : ''">
                                            <textarea type="text" class="form-control" rows="15" placeholder="Текст"
                                                    v-model="advice.full_text"></textarea>
                                            <error-block :errors="errors['full_text']" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="col-md-4 control-label">Локаль*</label>
                                        <div class="col-md-8" v-bind:class="errors['locale'] !== undefined ? 'has-error' : ''">
                                            <input type="text" class="form-control" placeholder="Locale"
                                                   v-model="advice.locale">
                                            <error-block v-bind:errors="errors['locale']" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="col-md-4 control-label">Слаг*</label>
                                        <div class="col-md-8" v-bind:class="errors['slug'] !== undefined ? 'has-error' : ''">
                                            <input type="text" class="form-control" placeholder="Slug"
                                                   v-model="advice.slug">
                                            <error-block v-bind:errors="errors['slug']"></error-block>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="col-md-5 control-label">Отображать на главной*</label>
                                        <div class="col-md-7" v-bind:class="errors['is_show_on_front'] !== undefined ? 'has-error' : ''">
                                            <toggle-button @change="setShowOnFront"
                                                           :value="showOnFront"
                                                           :sync="true"
                                                           :height="30"
                                                           :width="65"
                                                           :labels="{checked: 'ДА', unchecked: 'НЕТ'}"
                                            />
                                            <error-block v-bind:errors="errors['is_show_on_front']"></error-block>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" v-bind:class="tab === 2 ? 'active' : ''">
                                <div class="form-group row">
                                    <label class="col-md-2 control-label">SEO Title</label>
                                    <div class="col-md-10" v-bind:class="errors['seo_title'] !== undefined ? 'has-error' : ''">
                                        <input type="text" class="form-control" placeholder="Seo title"
                                               v-model="advice.seo_title">
                                        <error-block :errors="errors['seo_title']" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 control-label">SEO Description</label>
                                    <div class="col-md-10" v-bind:class="errors['seo_description'] !== undefined ? 'has-error' : ''">
                                        <input type="text" class="form-control" placeholder="SEO description"
                                               v-model="advice.seo_description">
                                        <error-block :errors="errors['seo_description'] " />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2 control-label">SEO Keywords</label>
                                    <div class="col-md-10" v-bind:class="errors['seo_keywords'] !== undefined ? 'has-error' : ''">
                                        <input type="text" class="form-control" placeholder="SEO keywords"
                                               v-model="advice.seo_keywords">
                                        <error-block :errors="errors['seo_keywords'] " />
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" v-bind:class="tab === 3 ? 'active' : ''">
                                <div class="form-group row">
                                    <label class="col-md-2 control-label">Thumbnail</label>
                                    <div class="col-md-10" v-bind:class="errors['attachment_id'] !== undefined ? 'has-error' : ''">
                                        <div style="display: inline-block; position: relative" v-if="advice.attachment instanceof Object">
                                            <i class="fa fa-close drop" v-on:click="deleteAttachment"></i>
                                            <img
                                                    style="height: 100px"
                                                    v-bind:src="advice.attachment.path"

                                            >
                                        </div>

                                        <dropzone v-else v-on:uploadSuccess="fileUploaded"/>
                                        <error-block :errors="errors['attachment_id']" />
                                    </div>
                                </div>
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
                advice: {},
                errors: {},
                tab: 1
            }
        },
        computed: {
            publishStatus: function () {
                return this.advice.is_publish == 1 ? true : false
            },
            showOnFront: function () {
              return this.advice.is_show_on_front == 1 ? true : false
          }
        },
        name: "editAdvice",
        props: ["inputAdvice"],
        mounted() {
            this.advice = Object.assign({}, this.inputAdvice);
        },
        methods: {
            fileUploaded: function(file, request) {
                this.$set(this.advice, 'attachment', request)
                this.advice.attachment_id = this.advice.attachment.id
            },
            deleteAttachment: function() {
                this.$set(this.advice, 'attachment', null)
                this.advice.attachment_id = null
            },
            setPublihStatus: function (value) {
                this.advice.is_publish = value.value === true ? 1 : 2
            },
            setShowOnFront: function (value) {
                this.advice.is_show_on_front = value.value === true ? 1 : 2
            },
            close: function () {
                this.$emit("close")
            },
            save: function (event) {
                this.errors = {};
                if (this.advice.id !== null) {
                    window.HTTP.put("/advice", this.advice).then(response => {
                        if (response.status == 202) {
                            this.$emit("updated", this.advice)
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
                    window.HTTP.post("/advice", this.advice).then(response => {
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
    i.drop {
        position: absolute;
        right: 0px;
        color: red;
        font-size: 25px;
        padding: 10px;
        background: rgba(255,255,255,0.7);
    }
</style>