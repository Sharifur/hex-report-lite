import React, {useEffect, useState} from 'react';
import {
    Chart as ChartJS,
    CategoryScale,
    LinearScale,
    BarElement,
    Title,
    Tooltip,
    Legend,
} from 'chart.js';
import { Bar } from 'react-chartjs-2';
import faker from "faker";
import { __ } from "@wordpress/i18n";
import axios from "axios";

ChartJS.register(
    CategoryScale,
    LinearScale,
    BarElement,
    Title,
    Tooltip,
    Legend
);

export const options = {
    responsive: true,
    plugins: {
        legend: {
            position: 'top',
        },
        title: {
            display: true,
            text: __( "Top two products selling comparison", "hexreport" ),
        },
    },
};

const labels = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September','October','November','December'];

export const data = {
    labels,
    datasets: [
        {
            label: 'Product 1',
            data: [5,10,58,7,8,45,125,300,44,333,11,77],
            backgroundColor: 'rgba(255, 99, 132, 0.5)',
        },
        {
            label: 'Product 2',
            data: [5,20,58,7,8,45,225,500,55,444,11,88],
            backgroundColor: 'rgba(53, 162, 235, 0.5)',
        },
    ],
};

export default function BarChart({title}) {
    return (
            <div className="chartWrapper">
                <div className="topPart">
                    <h4 className="title">{title}</h4>
                </div>
                <Bar options={options} data={data} />
            </div>
        )
}

