
import PageLayout from "../../components/Layouts/PageLayout.jsx";
import PageHeader from "../../components/Sections/PageHeader.jsx";
import Card from "../../components/Cards/Card.jsx";
import Container from "../../components/Layouts/Container.jsx";
import DoughnutChart from "../../components/charts/DoughnutChart.jsx";
import CardList from "../../components/Cards/CardList.jsx";
import "../../assets/scss/sections/sales-by-product.scss";
import BarChart from "../../components/charts/BarChart.jsx";
import React, {useEffect, useState} from "react";
import axios from "axios";
import { __ } from '@wordpress/i18n';



export default function ByCategories(){
	const {nonce,ajaxUrl,translate_array} = hexReportData;

	const [topSellingCategoriesNames, setTopSellingCategoriesNames] = useState([]);
	const [topSellingCategoriesCount, setTopSellingCategoriesCount] = useState([]);
	const [categoriesSaleRatio, setCategoriesSaleRatio] = useState([]);

	useEffect(() => {
		axios
			.get(ajaxUrl, {
				params: {
					nonce: nonce,
					action: 'get_top_selling_product_and_categoreis',
				},
				headers: {
					'Content-Type': 'application/json',
				},
			})
			.then(({data}) => {
				if (data) {
					setTopSellingCategoriesNames(data.topSellingCategoreisNames)
					setTopSellingCategoriesCount(data.topSellingCategoreisCount)
					setCategoriesSaleRatio(data.categoriesSalesRatio)
				}
				// Handle the response data
			})
			.catch((error) => {
				console.error('Error:', error);
			});

	}, []);

	const cardListItems = topSellingCategoriesNames.map((name, index) => ({
		title: name,
		amount: "("+categoriesSaleRatio[index].toFixed(2)+"%)",
	}));

	const noSaleText = __("No sales yet","hexreport");

	const doughnutProductData = {
		labels: topSellingCategoriesNames.length > 0 ? topSellingCategoriesNames : [noSaleText],
		datasets: [
			{
				label: __("No of times", "hexreport"),
				data: topSellingCategoriesCount.length > 0 ? topSellingCategoriesCount : [1],
				backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(153, 102, 255, 0.2)',
					'rgba(255, 159, 64, 0.2)',
				],
				borderColor: [
					'rgba(255, 99, 132, 1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(153, 102, 255, 1)',
					'rgba(255, 159, 64, 1)',
				],
				borderWidth: 1,
			},
		],
	};

	return (
		<PageLayout pageTitle="Sales By Categories">
			<Card padd="0">
				<PageHeader pageTitle={__("Sales By Categories","hexreport")} extraClass="padding-20 padding-bottom-0"/>
				<div className="commonFilterWrap pb0">

				</div>
				<Container col="1">
					<div className="chartWithListWrapper">
						<div className="donChart">
							<DoughnutChart labels={doughnutProductData.labels} datasets={doughnutProductData.datasets}/>
						</div>
						<div className="orderListWrapper">
							<CardList lists={cardListItems}/>
						</div>
					</div>
				</Container>
			</Card>
			<Card extraClass="margin-top-20">
				<BarChart title={__("Sales By Categories","hexreport")}/>
			</Card>
		</PageLayout>
	);
}
