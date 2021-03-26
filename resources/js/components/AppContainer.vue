<template>
    <el-container class="container" v-loading="loading"
                  element-loading-text="Loading..."
                  element-loading-spinner="el-icon-loading"
                  element-loading-background="rgba(0, 0, 0, 0.2)">

        <el-header type="flex" class="header" justify="center">
            <el-row type="flex" justify="center" class="header-content">
                <h1>Let’s find a perfect house</h1>
            </el-row>
        </el-header>

        <el-main >
            <el-alert v-if="error" :title="error" type="error" show-icon
                @close="clearError()" style="margin: 1rem 0;">
            </el-alert>
            <search-form/>
            <el-divider/>

            <result-table v-if="searchResult.length"
                          :tableData="searchResult"/>
            <no-result-message v-else/>
        </el-main>

        <el-footer class="center footer">
            <p>Made by Zoya Ivanova,
            <a href="mailto:zoya.ivanova.r@gmail.com">zoya.ivanova.r@gmail.com</a>
            </p>
        </el-footer>

    </el-container>
</template>

<script>
import SearchForm from './elements/SearchForm.vue';
import ResultTable from './elements/ResultTable.vue';
import NoResultMessage from './elements/NoResultMessage.vue';
import { mapState, mapActions } from 'vuex';

export default {
    name: 'AppContainer',
    components: {
        ResultTable,
        SearchForm,
        NoResultMessage,
    },
    computed: {
        ...mapState([
            'error',
            'searchResult',
            'loading',
        ]),
    },
    methods: {
        ...mapActions(['clearError']),
    },
}
</script>

<style scoped lang="sass">
.container
    min-height: 100vh
    width: 100%
    display: flex
    flex-direction: column
    justify-content: center

.header
    background-color: darkslateblue
    margin-bottom: 1rem
    min-width: 100%

.header-content
    padding-top: 1rem
    color: linen

.footer
    width: 100%
    background-color: #e0e0ea
    & p
        margin: auto
        color: #718096
        & a
            color: #718096

</style>
