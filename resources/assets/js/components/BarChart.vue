<script>
import VueCharts from 'vue-chartjs';
import { Pie } from 'vue-chartjs';

export default {
extends: Pie,
mounted(){
        console.log('Component Mounted..')
        let category = [];
        let total = [];
        axios.get('http://localhost:8000/api/expense-chart')
        .then((response) => {
            let data = response.data;
            // console.log(data);
            if(data){
                data.forEach(dat => {
                    category.push(dat.category);
                    total.push(dat.total);
                });
                    // console.log(category);
                this.renderChart(category,total)
                this.renderChart({
                    labels: category,
                    datasets: [{
                        labels : 'Total',
                        backgroundColor: ['#20c997','#fd7e14','#6f42c1'],
                        data: total
                    }]
                }, {responsive: true, maintainAspectRatio: false})
            }else{
                console.log('No data');
            }
        })
    },
created: function(){
    
    }    
}
</script>