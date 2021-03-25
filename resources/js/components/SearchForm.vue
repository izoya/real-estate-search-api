<template>
    <el-form ref="form" :model="form" label-width="120px">
        <el-form-item label="Property name">
            <el-input v-model="form.name" name="name"></el-input>
        </el-form-item>
        <el-form-item label="Bedrooms">
            <el-select v-model="form.bedrooms" name="bedrooms"
                       placeholder="select bedroom quantity">
                <el-option v-for="item in options.bedrooms" :label="item"
                           :value="item" v-bind:key="item"></el-option>
            </el-select>
        </el-form-item>
        <el-form-item label="Bathrooms">
            <el-select v-model="form.bathrooms" name="bathrooms"
                       placeholder="select bathrooms quantity">
                <el-option v-for="item in options.bathrooms" :label="item"
                           :value="item" v-bind:key="item"></el-option>
            </el-select>
        </el-form-item>
        <el-form-item label="Storeys">
            <el-select v-model="form.storeys" name="storeys"
                       placeholder="how many storeys">
                <el-option v-for="item in options.storeys" :label="item"
                           :value="item" v-bind:key="item"></el-option>
            </el-select>
        </el-form-item>
        <el-form-item label="Garages">
            <el-select v-model="form.garages" name="garages"
                       placeholder="select garages quantity">
                <el-option v-for="item in options.garages" :label="item"
                           :value="item" v-bind:key="item"></el-option>
            </el-select>
        </el-form-item>
        <el-form-item label="Price">
            <el-slider v-model="form.price"
                       name="price_range"
                       range
                       :min="options.priceMin"
                       :max="options.priceMax"
                       :step="sliderStep">
            </el-slider>
        </el-form-item>

        <el-form-item>
            <el-button type="primary" @click="onSubmit">Search</el-button>
        </el-form-item>
    </el-form>
</template>

<script>
import { mapActions, mapState } from 'vuex';

export default {
    name: 'SearchForm',
    data: function () {
        return {
            form: {
                name: '',
                bedrooms: '',
                bathrooms: '',
                storeys: '',
                garages: '',
                price: [0, 0],
            },
            sliderStep: 1000,
        }
    },
    computed: {
        ...mapState(['options']),
    },
    methods: {
        ...mapActions(['search', 'fetchOptions']),
        onSubmit() {
            this.search(this.$refs.form.model);
        },
    },
    watch: {
        options(to) {
            this.form.price = [to.priceMin, to.priceMax];
        },
    },
    beforeMount() {
        this.fetchOptions();
    },
};
</script>

<style scoped lang="sass">

</style>
