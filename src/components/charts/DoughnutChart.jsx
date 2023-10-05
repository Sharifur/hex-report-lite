import React from 'react';
import { Chart as ChartJS, ArcElement, Tooltip, Legend } from 'chart.js';
import { Doughnut } from 'react-chartjs-2';

ChartJS.register(ArcElement, Tooltip, Legend);

export function DoughnutChart({ localPickupRatio, flatRateRatio, freeShippingRatio }) {
	const {nonce,ajaxUrl,translate_array} = hexReportData;

	const data = {
		labels: [translate_array.localPickup, translate_array.flatRate, translate_array.freeShipping],
		datasets: [
			{
				label: translate_array.percentOfRatio,
				data: [localPickupRatio, flatRateRatio, freeShippingRatio],
				backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(75, 192, 192, 0.2)',
				],
				borderColor: [
					'rgba(255, 99, 132, 1)',
					'rgba(54, 162, 235, 1)',
					'rgba(75, 192, 192, 1)',
				],
				borderWidth: 1,
			},
		],
	};

	return <Doughnut data={data} />;
}
