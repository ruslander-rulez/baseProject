<template>
    <!-- BEGIN EXAMPLE TABLE PORTLET-->
    <div class="portlet light bordered">
      <!--  <div class="portlet-title">
            <div class="caption font-dark">
                <i class="icon-settings font-dark"></i>
                <span class="caption-subject bold uppercase"> Managed Table</span>
            </div>
            <div class="actions">
                <div class="btn-group btn-group-devided" data-toggle="buttons">
                    <label class="btn btn-transparent dark btn-outline btn-circle btn-sm active">
                        <input type="radio" name="options" class="toggle" id="option1">Actions</label>
                    <label class="btn btn-transparent dark btn-outline btn-circle btn-sm">
                        <input type="radio" name="options" class="toggle" id="option2">Settings</label>
                </div>
            </div>
        </div>-->
        <div class="portlet-body">
            <div class="table-toolbar">
                <div class="row">
                    <div class="col-md-12">
                        <uiv-alert
                                v-for="(item, index) in alertMessage"
                                :duration="10000"
                                :key="index"
                                dismissible
                                @dismissed="alertMessage.splice(index, 1)"
                                type="success"
                        >
                            {{item}}
                        </uiv-alert>
                    </div>
                     <div class="col-md-6">
                        <div class="btn-group">
                            <button id="sample_editable_1_new" class="btn sbold green" v-on:click="showNewOperationForm = true"> Add New
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-6">
             <!--           <div class="btn-group pull-right">
                            <button class="btn green  btn-outline dropdown-toggle" data-toggle="dropdown">Tools
                                <i class="fa fa-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu pull-right">
                                <li>
                                    <a href="javascript:;">
                                        <i class="fa fa-print"></i> Print </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="fa fa-file-pdf-o"></i> Save as PDF </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="fa fa-file-excel-o"></i> Export to Excel </a>
                                </li>
                            </ul>
                        </div>-->
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 button-type-line">
                        <range-datepicker
                            :inputDate="[this.filter.dateFrom, this.filter.dateTo]"
                            v-on:change="applyDateFilter"
                        ></range-datepicker>
                    </div>
                    <div class="col-md-12 button-type-line">
                        <a class="" style="background: #418bca;" v-on:click="applyFilter({filter: 'operationId', value: null })">Все</a>
                        <a class=""
                           v-for="(item, index) in stockOperationTypes"
                           v-bind:style="'background:'+item.color"
                           v-on:click="applyFilter({filter: 'operationId', value: index})"
                        >{{item.name}}</a>
                    </div>
                </div>
            </div>
            <div id="sample_1_wrapper" class="dataTables_wrapper no-footer">
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="dataTables_length" id="sample_1_length">
                            <label>Show
                                <select
                                        name="sample_editable_1_length" aria-controls="sample_editable_1"
                                        class="form-control input-sm input-xsmall input-inline"
                                        v-model="perPage" v-on:change="getData">
                                    <option v-for="perPage in perPageVariables" v-bind:value="perPage.val">
                                        {{ perPage.val }}
                                    </option>
                                </select> records
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                    <!--    <div id="sample_1_filter" class="dataTables_filter">
                            <label>Search:
                                <input type="search"
                                       class="form-control input-sm input-small input-inline"
                                       placeholder=""
                                       aria-controls="sample_1"></label>
                        </div>-->
                    </div>
                </div>
                <div class="table-scrollable">
                    <table class="table table-striped table-bordered table-hover table-checkable order-column dataTable no-footer"
                           id="sample_1" role="grid" aria-describedby="sample_1_info">
                        <thead>
                        <tr role="row">

                            <th tabindex="0" rowspan="1" colspan="1"
                                > #
                            </th>
                            <th class="sorting_asc" tabindex="0" rowspan="1" colspan="1"
                                > Товар
                            </th>
                            <th class="sorting_asc" tabindex="0" rowspan="1" colspan="1"
                                > Дата
                            </th>
                            <th class="sorting_asc" tabindex="0" rowspan="1" colspan="1"
                                > Склад
                            </th>
                            <th class="sorting_asc" tabindex="0" rowspan="1" colspan="1"
                                > Количество
                            </th>
                            <th class="sorting_asc" tabindex="0" rowspan="1" colspan="1"
                                > До операции
                            </th>
                            <th tabindex="0" rowspan="1" colspan="1"
                                > После операции
                            </th>
                            <th tabindex="0" rowspan="1" colspan="1"
                                > Коментарий
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                            <stock-operation-row
                                    v-for="(operation, index ) in stockOperations"
                                    v-bind:key="operation.id"
                                    v-bind:inputOperation="operation"
                            ></stock-operation-row>

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
        <stock-operation-new v-if="showNewOperationForm" v-on:close="showNewOperationForm=false" v-on:created="created">
        </stock-operation-new>
    </div>
    <!-- END EXAMPLE TABLE PORTLET-->

</template>

<script>
    import * as helper from "../../helper.js"

    export default {
        data() {
            return {
                pickerVal: [],
                stockOperationTypes: {},
                showNewOperationForm : false,
                filter: {
                    operationId: null,
                    dateFrom: null,
                    dateTo: null
                },
                stockOperations: [],
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
                ],
                alertMessage: []
            }
        },

        methods: {
            applyFilter: function (params) {
                this.filter[params.filter] = params.value
                this.page = 1;
                this.getData();
            },
            applyDateFilter: function (params) {
                this.filter.dateFrom = params[0]
                this.filter.dateTo = params[1]
                this.filter.dateTo.setHours(23,59,59,59);
                this.page = 1;
                this.getData();
            },
            showAlert: function(message) {
                this.alertMessage.push(message)
            },
            created: function() {
                this.showAlert("Операция была создана")
                this.getData()
            },
            getData: function () {
                window.HTTP
                    .get('/stock-operation/list', {
                        params: {
                            page: this.page,
                            perPage: this.perPage,
                            operationId: this.filter.operationId,
                            dateFrom: helper.presentDateToString(this.filter.dateFrom),
                            dateTo: helper.presentDateToString(this.filter.dateTo),
                        }
                    })
                    .then((response) => {
                        this.stockOperations = response.data;
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
            this.filter.dateTo = new Date();
            this.filter.dateTo.setHours(23,59,59);
            this.filter.dateFrom = new Date();
            this.filter.dateFrom.setDate(new Date().getDate() - 7);
            this.filter.dateFrom.setHours(0, 0, 0, 0);

            this.getData();
            this.stockOperationTypes = window.stockOperationTypes

        }
    }
</script>

<style>

</style>