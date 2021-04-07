import TestTable from './components/TestTable.vue';
import KategoriTable from './components/KategoriTable.vue';
import KategoriForm from './components/KategoriForm.vue';


const locales = window.AsgardCMS.locales;

export default [
    // Role Routes
    {
        path: '/siswa/test',
        name: 'admin.siswa.test.index',
        component: TestTable,
    },

    //Kategori
    {
        path: '/siswa/kategori',
        name: 'admin.siswa.kategori.index',
        component: KategoriTable,
    },
    {
        path: '/siswa/kategori/create',
        name: 'admin.siswa.kategori.create',
        component: KategoriForm,
    },
    {
        path: '/siswa/kategori/:kategori/edit',
        name: 'admin.siswa.kategori.edit',
        component: KategoriForm,
    },
];
