<template>
    <div class="portlet light portlet-fit bordered">
        <!--      <div class="portlet-title">
                  <div class="caption">
                      <i class="icon-settings font-red"></i>
                      <span class="caption-subject font-red sbold uppercase">Editable Table</span>
                  </div>
                  <div class="actions">
                      <div class="btn-group btn-group-devided" data-toggle="buttons">
                          <label class="btn btn-transparent red btn-outline btn-circle btn-sm active">
                              <input type="radio" name="options" class="toggle" id="option1">Actions</label>
                          <label class="btn btn-transparent red btn-outline btn-circle btn-sm">
                              <input type="radio" name="options" class="toggle" id="option2">Settings</label>
                      </div>
                  </div>
              </div> -->
        <div class="portlet-body">
            <div class="table-toolbar">
                <div class="row">
                    <div class="col-md-6">
                        <div class="btn-group">
                            <button id="sample_editable_1_new" class="btn green" v-on:click="addNew"> Add New
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <!--        <div class="btn-group pull-right">
                                <button class="btn green btn-outline dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Tools
                                    <i class="fa fa-angle-down"></i>
                                </button>
                                <ul class="dropdown-menu pull-right">
                                    <li>
                                        <a href="javascript:;"> Print </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;"> Save as PDF </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;"> Export to Excel </a>
                                    </li>
                                </ul>
                            </div>-->
                    </div>
                </div>
            </div>
            <div id="sample_editable_1_wrapper" class="dataTables_wrapper no-footer">
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="dataTables_length" id="sample_editable_1_length"><label>
                            <select
                                    name="sample_editable_1_length" aria-controls="sample_editable_1"
                                    class="form-control input-sm input-xsmall input-inline"
                                    v-model="perPage" v-on:change="getData">
                                <option v-for="perPage in perPageVariables" v-bind:value="perPage.val">
                                    {{ perPage.val }}
                                </option>
                            </select> records</label></div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <!--                  <div id="sample_editable_1_filter" class="dataTables_filter"><label>Search:<input type="search"
                                                                                                                            class="form-control input-sm input-small input-inline"
                                                                                                                            placeholder=""
                                                                                                                            aria-controls="sample_editable_1"></label>
                                          </div>-->
                    </div>
                </div>
                <div class="table-scrollable">
                    <table class="table table-striped table-hover table-bordered dataTable no-footer"
                           id="sample_editable_1" role="grid" aria-describedby="sample_editable_1_info"
                           style="width: 1002px;">
                        <thead>
                        <tr role="row">
                            <th class="sorting_asc" tabindex="0" aria-controls="sample_editable_1" rowspan="1"
                                colspan="1" aria-label=" Username : activate to sort column descending"
                                style="width: 148px;" aria-sort="ascending"> ID
                            </th>
                            <th tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1"
                                aria-label=" Full Name : activate to sort column ascending" style="width: 167px;">
                                Telephone number
                            </th>
                            <th tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1"
                                aria-label=" Points : activate to sort column ascending" style="width: 104px;"> Comment
                            </th>
                            <th tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1"
                                aria-label=" Edit : activate to sort column ascending" style="width: 75px;"> Edit
                            </th>
                            <th tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1"
                                aria-label=" Delete : activate to sort column ascending" style="width: 106px;"> Delete
                            </th>
                        </tr>
                        </thead>
                        <tbody>

                        <telbantable-row
                                v-for="(tel, index ) in telban"
                                v-bind:key="tel.id"
                                v-bind:inputTel="tel"
                                v-on:remove="telban.splice(index, 1)"
                                v-on:updateTable="getData"
                        ></telbantable-row>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <pagination
                        v-bind:maxCountItems="maxCountItems"
                        v-bind:page="page"
                        v-bind:countEntries="countEntries"
                        v-bind:perPage="perPage"
                        v-on:goToPage="goToPage"
                    >
                    </pagination>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                telban: [],
                perPage: null,
                page: 1,
                maxCountItems: 0,
                countEntries: {
                    to: 0,
                    from: 0
                },
                perPageVariables: [
                    {
                        val: 20
                    },
                    {
                        val: 50
                    },
                    {
                        val: 100
                    }
                ]
            }
        },
        methods: {
            addNew: function () {
                this.telban.unshift({
                    id: null,
                    telephone: "",
                    comment: ""
                })
            },
            getData: function () {
                axios
                    .get('/root/tel-ban/list', {params: {page: this.page, perPage: this.perPage}})
                    .then((response) => {
                        this.telban = response.data;
                        this.maxCountItems = parseInt(response.headers.maxcountitems);
                        this.countEntries.from = (this.page * this.perPage) - (this.perPage - 1);
                        this.countEntries.to = this.page * this.perPage;
                        if (this.countEntries.to > this.maxCountItems) {
                            this.countEntries.to = this.maxCountItems
                        }
                    });
            },
            goToPage: function (page) {
                this.page = page;
                this.getData()
            }
        },
        mounted() {
            this.perPage = this.perPageVariables[this.perPageVariables.length - 1].val;
            this.getData();
        }
    }
</script>

<style scoped>

</style>