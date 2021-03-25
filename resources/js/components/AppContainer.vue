<template>
    <el-container>

        <el-header><h1>Let’s find a perfect house</h1>
        </el-header>

        <el-main>
            <search-form/>
            <el-divider/>
            <result-table v-if="searchResult.length"
                          :tableData="searchResult"/>
        </el-main>

        <el-footer>
        </el-footer>

    </el-container>
</template>

<script>
import SearchForm from './SearchForm.vue';
import ResultTable from './ResultTable.vue';

export default {
    name: 'AppContainer',
    components: { ResultTable, SearchForm },
    data: function () {
        return {
            searchResult: [{
                name: 'The Victoria',
                price: 374662,
                bedrooms: 4,
                bathrooms: 2,
                storeys: 2,
                garages: 2,
            }, {
                name: 'The Xavier',
                price: 513268,
                bedrooms: 4,
                bathrooms: 2,
                storeys: 1,
                garages: 2
            },],
        }
    },
    computed: {

    },
    methods: {


    },
    mounted() {

    }
};
</script>

<style scoped lang="sass">

</style>
