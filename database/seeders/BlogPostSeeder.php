<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BlogPost;
use App\Models\User;
use Illuminate\Support\Str;

class BlogPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first();

        $blogPosts = [
            [
                'title' => 'Tanker Market Analysis: Q4 2024 Review',
                'slug' => 'tanker-market-analysis-q4-2024-review',
                'excerpt' => 'Comprehensive analysis of the tanker market performance in Q4 2024, including freight rates, vessel values, and market outlook.',
                'content' => '<p>The tanker market has shown remarkable resilience throughout Q4 2024, with significant improvements in freight rates across all vessel segments. This comprehensive analysis examines the key factors driving market performance and provides insights into future trends.</p><h2>Market Performance Overview</h2><p>VLCC rates have averaged $45,000 per day, representing a 25% increase compared to Q3. Suezmax vessels have seen rates of $35,000 per day, while Aframax rates have stabilized around $28,000 per day.</p><h2>Key Market Drivers</h2><ul><li>Increased oil demand from Asian markets</li><li>Geopolitical tensions affecting trade routes</li><li>Fleet supply constraints due to newbuilding delays</li><li>Environmental regulations impacting vessel availability</li></ul><h2>Future Outlook</h2><p>Looking ahead to 2025, we expect continued strength in the tanker market, driven by sustained demand growth and limited new vessel deliveries. However, potential economic headwinds and regulatory changes could introduce volatility.</p>',
                'category' => 'Market Trends',
                'author_name' => 'SMA Ship Brokers',
                'author_id' => $user ? $user->id : null,
                'tags' => ['tanker', 'market analysis', 'freight rates', 'Q4 2024'],
                'is_published' => true,
                'published_at' => now()->subDays(5),
                'views_count' => 1250,
            ],
            [
                'title' => 'Time Charter vs Voyage Charter: Making the Right Choice',
                'slug' => 'time-charter-vs-voyage-charter-making-right-choice',
                'excerpt' => 'Understanding the differences between time and voyage charters, and how to choose the right option for your business needs.',
                'content' => '<p>Choosing between time charter and voyage charter arrangements is one of the most critical decisions in maritime operations. This guide provides a detailed comparison to help you make informed decisions.</p><h2>Time Charter Advantages</h2><ul><li>Predictable costs and revenue streams</li><li>Longer-term planning capabilities</li><li>Operational control over vessel employment</li><li>Flexibility in cargo selection</li></ul><h2>Voyage Charter Benefits</h2><ul><li>No capital investment required</li><li>Simplified operational requirements</li><li>Market rate exposure</li><li>Reduced administrative burden</li></ul><h2>Decision Factors</h2><p>Consider your cargo flow patterns, market conditions, financial resources, and operational capabilities when choosing between charter types.</p>',
                'category' => 'Chartering',
                'author_name' => 'SMA Ship Brokers',
                'author_id' => $user ? $user->id : null,
                'tags' => ['chartering', 'time charter', 'voyage charter', 'maritime operations'],
                'is_published' => true,
                'published_at' => now()->subDays(8),
                'views_count' => 890,
            ],
            [
                'title' => 'Ship Sale & Purchase: Due Diligence Checklist',
                'slug' => 'ship-sale-purchase-due-diligence-checklist',
                'excerpt' => 'Essential checklist for conducting thorough due diligence when buying or selling vessels in today\'s market.',
                'content' => '<p>Successful ship sale and purchase transactions require meticulous due diligence. This comprehensive checklist covers all critical aspects of vessel evaluation.</p><h2>Technical Due Diligence</h2><ul><li>Vessel condition assessment</li><li>Class records review</li><li>Maintenance history analysis</li><li>Technical specifications verification</li></ul><h2>Commercial Due Diligence</h2><ul><li>Market value analysis</li><li>Employment potential assessment</li><li>Charter party review</li><li>Operating cost analysis</li></ul><h2>Legal Due Diligence</h2><ul><li>Ownership verification</li><li>Encumbrance checks</li><li>Regulatory compliance review</li><li>Documentation validation</li></ul>',
                'category' => 'S&P',
                'author_name' => 'SMA Ship Brokers',
                'author_id' => $user ? $user->id : null,
                'tags' => ['S&P', 'due diligence', 'vessel purchase', 'maritime law'],
                'is_published' => true,
                'published_at' => now()->subDays(12),
                'views_count' => 756,
            ],
            [
                'title' => 'Vessel Valuation Methods: A Comprehensive Guide',
                'slug' => 'vessel-valuation-methods-comprehensive-guide',
                'excerpt' => 'Exploring different vessel valuation methodologies and their applications in various market conditions.',
                'content' => '<p>Accurate vessel valuation is essential for informed decision-making in maritime investments. This guide explores the most effective valuation methods used in the industry.</p><h2>Market Comparison Method</h2><p>This approach compares the subject vessel with similar vessels that have recently been sold or are currently on the market.</p><h2>Income Capitalization Method</h2><p>Based on the vessel\'s earning potential, this method calculates present value using projected cash flows and appropriate discount rates.</p><h2>Cost Approach</h2><p>Considers the cost of building a similar vessel, adjusted for depreciation and market conditions.</p>',
                'category' => 'Valuation',
                'author_name' => 'SMA Ship Brokers',
                'author_id' => $user ? $user->id : null,
                'tags' => ['valuation', 'vessel appraisal', 'maritime finance', 'investment analysis'],
                'is_published' => true,
                'published_at' => now()->subDays(15),
                'views_count' => 634,
            ],
            [
                'title' => 'New Environmental Regulations Impacting Shipping',
                'slug' => 'new-environmental-regulations-impacting-shipping',
                'excerpt' => 'Analysis of new environmental regulations and their potential impact on vessel operations and market dynamics.',
                'content' => '<p>The maritime industry faces increasing environmental regulations that will significantly impact vessel operations and market dynamics. This analysis examines the latest developments.</p><h2>IMO 2023 Regulations</h2><p>New sulfur emission standards and energy efficiency requirements are driving vessel modifications and newbuilding specifications.</p><h2>EU ETS Implementation</h2><p>The European Union\'s Emissions Trading System now includes maritime transport, affecting vessel operations in EU waters.</p><h2>Future Regulatory Trends</h2><p>Anticipated regulations include stricter carbon intensity requirements and alternative fuel mandates.</p>',
                'category' => 'Industry News',
                'author_name' => 'SMA Ship Brokers',
                'author_id' => $user ? $user->id : null,
                'tags' => ['environmental regulations', 'IMO', 'EU ETS', 'sustainability'],
                'is_published' => true,
                'published_at' => now()->subDays(18),
                'views_count' => 445,
            ],
            [
                'title' => 'Dry Bulk Market Recovery: Signs of Improvement',
                'slug' => 'dry-bulk-market-recovery-signs-improvement',
                'excerpt' => 'Examining the signs of recovery in the dry bulk market and what this means for vessel owners and operators.',
                'content' => '<p>The dry bulk market is showing encouraging signs of recovery after a challenging period. This analysis examines the key indicators and implications for market participants.</p><h2>Freight Rate Improvements</h2><p>Capasize rates have increased by 40% over the past quarter, while Panamax and Supramax segments have shown similar improvements.</p><h2>Demand Drivers</h2><ul><li>Strong iron ore demand from China</li><li>Grain trade expansion</li><li>Infrastructure development projects</li><li>Coal trade recovery</li></ul><h2>Supply Side Factors</h2><p>Limited newbuilding deliveries and increased scrapping rates have helped balance supply and demand.</p>',
                'category' => 'Market Trends',
                'author_name' => 'SMA Ship Brokers',
                'author_id' => $user ? $user->id : null,
                'tags' => ['dry bulk', 'market recovery', 'freight rates', 'commodity trade'],
                'is_published' => true,
                'published_at' => now()->subDays(22),
                'views_count' => 567,
            ],
        ];

        foreach ($blogPosts as $post) {
            BlogPost::create($post);
        }
    }
}
