import React, { useState } from 'react';
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card';
import { Button } from '@/components/ui/button';
import { Tabs, TabsContent, TabsList, TabsTrigger } from '@/components/ui/tabs';
import VesselSalePurchaseForm from './VesselSalePurchaseForm';
import VesselCharteringForm from './VesselCharteringForm';

const VesselForms: React.FC = () => {
  const [activeTab, setActiveTab] = useState('sale-purchase');

  return (
    <div className="min-h-screen bg-gradient-to-br from-gray-50 to-white py-12">
      <div className="container mx-auto px-4">
        <div className="text-center mb-8">
          <h1 className="text-4xl font-bold text-gray-800 mb-4">
            Vessel Services
          </h1>
          <p className="text-xl text-gray-600 max-w-3xl mx-auto">
            Submit your vessel requirements for sale, purchase, or chartering services. 
            Our experienced team will help you find the perfect vessel for your needs.
          </p>
        </div>

        <Tabs value={activeTab} onValueChange={setActiveTab} className="w-full">
          <TabsList className="grid w-full grid-cols-2 mb-8">
            <TabsTrigger value="sale-purchase" className="text-lg py-3">
              Sale & Purchase
            </TabsTrigger>
            <TabsTrigger value="chartering" className="text-lg py-3">
              Chartering
            </TabsTrigger>
          </TabsList>

          <TabsContent value="sale-purchase" className="mt-0">
            <VesselSalePurchaseForm />
          </TabsContent>

          <TabsContent value="chartering" className="mt-0">
            <VesselCharteringForm />
          </TabsContent>
        </Tabs>

        {/* Additional Information */}
        <div className="mt-12 grid grid-cols-1 md:grid-cols-3 gap-8">
          <Card className="text-center">
            <CardContent className="pt-6">
              <div className="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg className="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
              </div>
              <h3 className="text-lg font-semibold mb-2">Expert Consultation</h3>
              <p className="text-gray-600">
                Get professional advice from our experienced maritime professionals.
              </p>
            </CardContent>
          </Card>

          <Card className="text-center">
            <CardContent className="pt-6">
              <div className="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg className="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
              </div>
              <h3 className="text-lg font-semibold mb-2">Fast Response</h3>
              <p className="text-gray-600">
                Receive quick responses to your vessel requirements within 24 hours.
              </p>
            </CardContent>
          </Card>

          <Card className="text-center">
            <CardContent className="pt-6">
              <div className="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg className="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
              </div>
              <h3 className="text-lg font-semibold mb-2">Global Network</h3>
              <p className="text-gray-600">
                Access our worldwide network of vessel owners and charterers.
              </p>
            </CardContent>
          </Card>
        </div>
      </div>
    </div>
  );
};

export default VesselForms;
