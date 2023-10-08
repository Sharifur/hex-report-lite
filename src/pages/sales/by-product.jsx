
import PageLayout from "../../components/Layouts/PageLayout.jsx";
import PageHeader from "../../components/Sections/PageHeader.jsx";
import Card from "../../components/Cards/Card.jsx";
import Select from "../../components/Elements/Select.jsx";
import DropDownButton from "../../components/Elements/DropDownButton.jsx";
import Container from "../../components/Layouts/Container.jsx";
import DoughnutChart from "../../components/charts/DoughnutChart.jsx";
import CardList from "../../components/Cards/CardList.jsx";
import "../../assets/scss/sections/sales-by-product.scss";
import Thead from "../../components/Elements/Table/Thead.jsx";
import Tbody from "../../components/Elements/Table/Tbody.jsx";
import Table from "../../components/Elements/Table/Table.jsx";
import BarChart from "../../components/charts/BarChart.jsx";
import React, {useEffect, useState} from "react";
import axios from "axios";
import { __ } from '@wordpress/i18n';



export default function ByProduct(){
	const {nonce,ajaxUrl,translate_array} = hexReportData;

	const [topSellingSixCategories, setTopSellingSixCategories] = useState({
		topCatNameOne: '',
		topCatOneSellRatio: 0,
		topCatNameTwo: '',
		topCatTwoSellRatio: 0,
		topCatNameThree: '',
		topCatThreeSellRatio: 0,
		topCatNameFour: '',
		topCatFourSellRatio: 0,
		topCatNameFive: '',
		topCatFiveSellRatio: 0,
		topCatNameSix: '',
		topCatSixSellRatio: 0,
	});

	const [topSellingSixProducts, setTopSellingSixProducts] = useState({
		topProNameOne: '',
		topProNameTwo: '',
		topProNameThree: '',
		topProNameFour: '',
		topProNameFive: '',
		topProNameSix: '',
		topProCountOne: 0,
		topProCountTwo: 0,
		topProCountThree: 0,
		topProCountFour: 0,
		topProCountFive: 0,
		topProCountSix: 0,
	});

	useEffect(() => {
		axios
			.get(ajaxUrl, {
				params: {
					nonce: nonce,
					action: 'show_top_six_selling_categories',
				},
				headers: {
					'Content-Type': 'application/json',
				},
			})
			.then(({data}) => {
				if (data) {
					setTopSellingSixCategories({
						topCatNameOne : data.topCatNameOne,
						topCatOneSellRatio : data.topCatOneSellRatio,
						topCatNameTwo : data.topCatNameTwo,
						topCatTwoSellRatio : data.topCatTwoSellRatio,
						topCatNameThree : data.topCatNameThree,
						topCatThreeSellRatio : data.topCatThreeSellRatio,
						topCatNameFour : data.topCatNameFour,
						topCatFourSellRatio : data.topCatFourSellRatio,
						topCatNameFive : data.topCatNameFive,
						topCatFiveSellRatio : data.topCatFiveSellRatio,
						topCatNameSix : data.topCatNameSix,
						topCatSixSellRatio : data.topCatSixSellRatio,
					})
				}
				// Handle the response data
			})
			.catch((error) => {
				console.error('Error:', error);
			});

	}, []);

	useEffect(() => {
		axios
			.get(ajaxUrl, {
				params: {
					nonce: nonce,
					action: 'show_top_selling_products',
				},
				headers: {
					'Content-Type': 'application/json',
				},
			})
			.then(({data}) => {
				if (data) {
					setTopSellingSixProducts({
						topProNameOne: data.topProNameOne,
						topProNameTwo: data.topProNameTwo,
						topProNameThree: data.topProNameThree,
						topProNameFour: data.topProNameFour,
						topProNameFive: data.topProNameFive,
						topProNameSix: data.topProNameSix,
						topProCountOne: data.topProCountOne,
						topProCountTwo: data.topProCountTwo,
						topProCountThree: data.topProCountThree,
						topProCountFour: data.topProCountFour,
						topProCountFive: data.topProCountFive,
						topProCountSix: data.topProCountSix,
					})
				}
				// Handle the response data
			})
			.catch((error) => {
				console.error('Error:', error);
			});

	}, []);

	const {topCatNameOne,topCatOneSellRatio,topCatNameTwo,topCatTwoSellRatio,topCatNameThree,topCatThreeSellRatio,topCatNameFour,topCatFourSellRatio,topCatNameFive,topCatFiveSellRatio,topCatNameSix,topCatSixSellRatio} = topSellingSixCategories;

	const {topProNameOne,topProNameTwo,topProNameThree,topProNameFour,topProNameFive,topProNameSix,topProCountOne,topProCountTwo,topProCountThree,topProCountFour,topProCountFive,topProCountSix} = topSellingSixProducts;

	const translatedText = {
		noOfTimes: __("No of times", "hexreport"),
		productName: __("Product Name", "hexreport"),
		productType: __("Product Type", "hexreport"),
		netQuantity: __("Net Quantity", "hexreport"),
		grossSales: __("Gross Sales", "hexreport"),
		discount: __("Discount", "hexreport"),
		returns: __("Returns", "hexreport"),
		shipping: __("Shipping", "hexreport"),
		taxes: __("Taxes", "hexreport"),
		totalSales: __("Total Sales", "hexreport"),
	}

    const cardListItems = [
    ];

	if (topCatNameOne !== null) {
		cardListItems.push({ title: __( topCatNameOne, "hexreport" ), amount: "("+__(topCatOneSellRatio.toFixed(2),"hexreport")+"%)" });
	} if(topCatNameTwo !== null) {
		cardListItems.push({ title: __(topCatNameTwo,"hexreport"), amount: "("+__(topCatTwoSellRatio.toFixed(2),"hexreport")+"%)" });
	} if(topCatNameThree!== null) {
		cardListItems.push({ title: __(topCatNameThree,"hexreport"), amount: "("+__(topCatThreeSellRatio.toFixed(2),"hexreport")+"%)" });
	} if(topCatNameFour !== null) {
		cardListItems.push({ title: __(topCatNameFour,"hexreport"), amount: "("+__(topCatFourSellRatio.toFixed(2),"hexreport")+"%)" });
	} if(topCatNameFive !== null) {
		cardListItems.push({ title: __(topCatNameFive,"hexreport"), amount: "("+__(topCatFiveSellRatio.toFixed(2),"hexreport")+"%)" });
	} if(topCatNameSix !== null) {
		cardListItems.push({ title: __(topCatNameSix,"hexreport"), amount: "("+__(topCatSixSellRatio.toFixed(2),"hexreport")+"%)" });
	}

    const TableData = [
        ["Milk","Food","63164.00","10.616.00","24.29.00","606.775.00","8.7268.00","37.546.00","654.433.00"],
        ["Face wash","Beauty","2620312","60.000","124.000","573.750.00","2.756.000","67.660.75","210.000.75"]
    ];

	const doughnutProductData = {
		labels: [topProNameOne, topProNameTwo, topProNameThree, topProNameFour,topProNameFive,topProNameSix],
		datasets: [
			{
				label: translatedText.noOfTimes,
				data: [topProCountOne,topProCountTwo,topProCountThree,topProCountFour,topProCountFive,topProCountSix],
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
        <PageLayout pageTitle="Sales By Product">
            <Card padd="0">
                <PageHeader pageTitle={__("Sales By Product","hexreport")} extraClass="padding-20 padding-bottom-0"/>
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
                    <Table info={{current: 1,items: 10,total: 60}} pagination={{current:1}}>
                        <Thead>
                            <th>{translatedText.productName} </th>
                            <th>{translatedText.productType}</th>
                            <th>{translatedText.netQuantity}</th>
                            <th>{translatedText.grossSales}</th>
                            <th>{translatedText.discount}</th>
                            <th>{translatedText.returns}</th>
                            <th>{translatedText.shipping}</th>
                            <th>{translatedText.taxes}</th>
                            <th>{translatedText.totalSales}</th>
                        </Thead>
                        <Tbody>
                            {TableData.map((item,index) => (
                                <tr key={index}>
                                    {item.map((td,index) => (
                                        <td key={index}>{td}</td>
                                    ))}
                                </tr>
                            ))}
                        </Tbody>
                    </Table>
                </Container>
            </Card>
            <Card extraClass="margin-top-20">
                <BarChart title={__("Sales By Product","hexreport")}/>
            </Card>
        </PageLayout>
    );
}
