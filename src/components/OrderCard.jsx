import CardList from "./Cards/CardList.jsx";
import "../assets/scss/elements/order-card.scss";
import CardHeader from "./Cards/CardHeader.jsx";
import Card from "./Cards/Card.jsx";
import React, {useEffect, useState} from "react";
import axios from "axios";
import { __ } from "@wordpress/i18n";
export default function OrderCard({title}){
	const {nonce,ajaxUrl,translate_array} = hexReportData;

	const [totalSalesAmount, setTotalSalesAmount] = useState({
		totalOrdersAmount: 0,
	});

	const [totalSalesAmountPhases, setTotalSalesAmountPhases] = useState({
		totalCompletedOredersFromJanToApr: 0,
		totalCompletedOredersFromMayToAug: 0,
		totalCompletedOredersFromSepToDec: 0,
	});


	useEffect(() => {
		axios
			.get(ajaxUrl, {
				params: {
					nonce: nonce,
					action: 'total_sales_amount',
				},
				headers: {
					'Content-Type': 'application/json',
				},
			})
			.then(({data}) => {
				if (data) {
					setTotalSalesAmount({
						totalOrdersAmount : data.totalOrdersAmount,
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
					action: 'total_completed_order_in_three_phases',
				},
				headers: {
					'Content-Type': 'application/json',
				},
			})
			.then(({data}) => {
				if (data) {
					setTotalSalesAmountPhases({
						totalCompletedOredersFromJanToApr : data.totalCompletedOredersFromJanToApr,
						totalCompletedOredersFromMayToAug : data.totalCompletedOredersFromMayToAug,
						totalCompletedOredersFromSepToDec : data.totalCompletedOredersFromSepToDec,
					})
				}
				// Handle the response data
			})
			.catch((error) => {
				console.error('Error:', error);
			});

	}, []);

	const {totalOrdersAmount} = totalSalesAmount;

	const {totalCompletedOredersFromJanToApr,totalCompletedOredersFromMayToAug,totalCompletedOredersFromSepToDec} = totalSalesAmountPhases;

	let dailyAverageSale = totalOrdersAmount / 365;

	const translatedText = {
		totalOrders: __( "Total Orders", 'hexreport' ),
		dailyAverage: __( "Daily Average", 'hexreport' ),
		janToApr: __( "Jan-Apr", 'hexreport' ),
		mayToAug: __( "May-Aug", 'hexreport' ),
		sepToDec: __( "Sep-Dec", 'hexreport' ),
	}

    const cardListItems = [
        {title: translatedText.totalOrders,amount: "$"+totalOrdersAmount.toFixed(2)},
        {title: translatedText.dailyAverage,amount: "$"+dailyAverageSale.toFixed(2)},
        {title: translatedText.janToApr,amount: "$"+totalCompletedOredersFromJanToApr.toFixed(2)},
        {title: translatedText.mayToAug,amount: "$"+totalCompletedOredersFromMayToAug.toFixed(2)},
        {title: translatedText.sepToDec,amount: "$"+totalCompletedOredersFromSepToDec.toFixed(2)},
    ];
    return (
        <Card>
            <CardHeader title={translate_array.orders} align="center"/>
            <CardList lists={cardListItems}/>
        </Card>
    )
}
