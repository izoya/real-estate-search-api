<template>
    <el-container>

        <el-header><h1>Let’s find a perfect house</h1>
        </el-header>

        <el-main>
            <el-alert v-if="error" :title="error" type="error" show-icon
                @close="clearError()" style="margin: 1rem 0;">
            </el-alert>
            <search-form/>
            <el-divider/>
            <div v-if="noResultMessage"><p>{{ noResultMessage }}</p></div>
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
import { mapState, mapActions } from 'vuex';

export default {
    name: 'AppContainer',
    components: { ResultTable, SearchForm },
    data: function () {
        return {
        };
    },
    computed: {
        ...mapState(['error', 'searchResult', 'noResultMessage']),
    },
    methods: {
        ...mapActions(['clearError']),
    },
    mounted() {
    },
}
</script>

<style scoped lang="sass">

</style>
