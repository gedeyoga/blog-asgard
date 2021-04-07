<template>
    <div>
        <div class="content-header">
            <h1>
                {{ trans('siswas.kategori.title.kategories') }}
            </h1>
            <el-breadcrumb separator="/">
                <el-breadcrumb-item>
                    <a href="/backend">{{ trans('core.breadcrumb.home') }}</a>
                </el-breadcrumb-item>
                <el-breadcrumb-item :to="{name: 'admin.user.users.index'}">{{ trans('siswas.kategori.title.kategories') }}
                </el-breadcrumb-item>
            </el-breadcrumb>
        </div>
        <el-form :rules="rules" ref="form" :model="form" label-width="120px">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-body">
                            <el-form-item :label="trans('siswas.kategori.title.kategories')"  prop="nama_kategori">
                                <el-input v-model="form.nama_kategori"></el-input>
                            </el-form-item>
                        </div>
                        <div class="box-footer">
                            <el-form-item>
                                <el-button type="primary" @click="onSubmit('form')" :loading="loading">
                                    {{ trans('core.save') }}
                                </el-button>
                                <el-button @click="onCancel()">{{ trans('core.button.cancel') }}
                                </el-button>
                            </el-form-item>
                        </div>
                    </div>
                </div>
            </div>
        </el-form>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        data() {
            return {
                form: {
                    nama_kategori: ''
                },
                loading: false,
                rules: {
                    nama_kategori:[
                        { required: true, message: 'Please input categories name', trigger: 'blur' }
                    ]
                }
            }
        },
        methods: {
            onSubmit(form) {
                this.$refs[form].validate((valid) => {
                    if (valid) {
                        axios.post(this.getRoute(), this.form)
                        .then( (response)  => {
                            console.log(response.data.message);
                            this.loading = false;
                            this.$message({
                                type:'success',
                                message: response.data.message
                            });
                            this.$router.push({ name: 'admin.siswa.kategori.index' });
                        })
                        .catch((error) => {
                            console.log(json.PARSE(error));
                            this.loading = false;
                            this.$notify.error({
                                title: 'Error',
                                message: 'There are some errors in the form.',
                            });
                        });
                    } else {
                        return false;
                    }
                });
            },
            onCancel() {
                this.$router.push({ name: 'admin.siswa.kategori.index' });
            },
            getRoute() {
                if (this.$route.params.kategori !== undefined) {
                    return route('api.siswa.kategori.update', { kategori: this.$route.params.kategori });
                }
                return route('api.siswa.kategori.store');
            },
            fetchData(){
                this.loading = true;
                let routeUri = '';
                if (this.$route.params.kategori !== undefined) {
                    routeUri = route('api.siswa.kategori.find', { kategori: this.$route.params.kategori });
                } else {
                    this.loading = false;
                    this.$notify.error({
                        title: 'Error',
                        message: 'No data !.',
                    });
                    this.$router.push({ name: 'admin.siswa.kategori.index' });
                }
                axios.post(routeUri)
                    .then((response) => {
                        this.loading = false;
                        console.log(response.data);
                        this.form = response.data;
                });
            }
        },
        mounted(){
            this.fetchData();
        }
    }
</script>