import React, { useState } from 'react';
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Select, SelectContent, SelectItem, SelectTrigger, SelectValue } from '@/components/ui/select';
import { Button } from '@/components/ui/button';
import { Textarea } from '@/components/ui/textarea';
import { Calendar } from '@/components/ui/calendar';
import { Popover, PopoverContent, PopoverTrigger } from '@/components/ui/popover';
import { CalendarIcon } from 'lucide-react';
import { format } from 'date-fns';

interface CharteringFormData {
  // Organisation Details
  organisationType: string;
  companyName: string;
  phone: string;
  email: string;
  address: string;
  
  // Charter Details
  charterType: string;
  vesselType: string;
  laycanDeliveryDate: Date | undefined;
  budgetAmount: string;
  budgetUnit: string;
  
  // Freight Details
  portOfLoading: string;
  portOfDischarge: string;
  cargoType: string;
  cargoQuantity: string;
  loadRate: string;
  dischargeRate: string;
}

const VesselCharteringForm: React.FC = () => {
  const [formData, setFormData] = useState<CharteringFormData>({
    organisationType: '',
    companyName: '',
    phone: '',
    email: '',
    address: '',
    charterType: '',
    vesselType: '',
    laycanDeliveryDate: undefined,
    budgetAmount: '',
    budgetUnit: '',
    portOfLoading: '',
    portOfDischarge: '',
    cargoType: '',
    cargoQuantity: '',
    loadRate: '',
    dischargeRate: '',
  });

  const handleInputChange = (field: keyof CharteringFormData, value: string | Date | undefined) => {
    setFormData(prev => ({
      ...prev,
      [field]: value
    }));
  };

  const handleSubmit = (e: React.FormEvent) => {
    e.preventDefault();
    console.log('Chartering Form Data:', formData);
    // Handle form submission here
  };

  const organisationTypes = [
    'Importer',
    'Exporter',
    'Commodity Trader',
    'Ship Owner',
    'Other'
  ];

  const charterTypes = [
    'Voyage Charter',
    'Time Charter',
    'Bareboat Charter'
  ];

  const vesselTypes = [
    'Dry Bulk',
    'Tanker',
    'Container',
    'LNG',
    'LPG',
    'Offshore',
    'Other'
  ];

  const cargoTypes = [
    'Break Bulk',
    'Coal',
    'Grain',
    'Oil',
    'Iron Ore',
    'Coal',
    'Cement',
    'Fertilizer',
    'Other'
  ];

  const budgetUnits = [
    'USD / TON',
    'USD / Day'
  ];

  return (
    <div className="max-w-4xl mx-auto p-6">
      <Card className="shadow-lg">
        <CardHeader className="text-center">
          <CardTitle className="text-3xl font-bold text-gray-800">
            Vessel Chartering Form
          </CardTitle>
          <p className="text-gray-600 mt-2">
            Submit your vessel chartering requirements
          </p>
        </CardHeader>
        <CardContent>
          <form onSubmit={handleSubmit} className="space-y-8">
            {/* Organisation Details */}
            <div className="space-y-6">
              <h3 className="text-xl font-semibold text-gray-800 border-b pb-2">
                Organisation Details
              </h3>
              <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div className="space-y-2">
                  <Label htmlFor="organisationType">Type of Organisation</Label>
                  <Select 
                    value={formData.organisationType} 
                    onValueChange={(value) => handleInputChange('organisationType', value)}
                  >
                    <SelectTrigger>
                      <SelectValue placeholder="Select organisation type" />
                    </SelectTrigger>
                    <SelectContent>
                      {organisationTypes.map((type) => (
                        <SelectItem key={type} value={type}>{type}</SelectItem>
                      ))}
                    </SelectContent>
                  </Select>
                </div>

                <div className="space-y-2">
                  <Label htmlFor="companyName">Company Name</Label>
                  <Input
                    id="companyName"
                    value={formData.companyName}
                    onChange={(e) => handleInputChange('companyName', e.target.value)}
                    placeholder="Enter company name"
                    required
                  />
                </div>

                <div className="space-y-2">
                  <Label htmlFor="phone">Phone</Label>
                  <Input
                    id="phone"
                    type="tel"
                    value={formData.phone}
                    onChange={(e) => handleInputChange('phone', e.target.value)}
                    placeholder="Enter phone number"
                    required
                  />
                </div>

                <div className="space-y-2">
                  <Label htmlFor="email">Email</Label>
                  <Input
                    id="email"
                    type="email"
                    value={formData.email}
                    onChange={(e) => handleInputChange('email', e.target.value)}
                    placeholder="Enter email address"
                    required
                  />
                </div>

                <div className="space-y-2 md:col-span-2">
                  <Label htmlFor="address">Address</Label>
                  <Textarea
                    id="address"
                    value={formData.address}
                    onChange={(e) => handleInputChange('address', e.target.value)}
                    placeholder="Enter complete address"
                    rows={3}
                    required
                  />
                </div>
              </div>
            </div>

            {/* Charter Details */}
            <div className="space-y-6">
              <h3 className="text-xl font-semibold text-gray-800 border-b pb-2">
                Charter Details
              </h3>
              <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div className="space-y-2">
                  <Label htmlFor="charterType">Type of Charter</Label>
                  <Select 
                    value={formData.charterType} 
                    onValueChange={(value) => handleInputChange('charterType', value)}
                  >
                    <SelectTrigger>
                      <SelectValue placeholder="Select charter type" />
                    </SelectTrigger>
                    <SelectContent>
                      {charterTypes.map((type) => (
                        <SelectItem key={type} value={type}>{type}</SelectItem>
                      ))}
                    </SelectContent>
                  </Select>
                </div>

                <div className="space-y-2">
                  <Label htmlFor="vesselType">Type of Vessel</Label>
                  <Select 
                    value={formData.vesselType} 
                    onValueChange={(value) => handleInputChange('vesselType', value)}
                  >
                    <SelectTrigger>
                      <SelectValue placeholder="Select vessel type" />
                    </SelectTrigger>
                    <SelectContent>
                      {vesselTypes.map((type) => (
                        <SelectItem key={type} value={type}>{type}</SelectItem>
                      ))}
                    </SelectContent>
                  </Select>
                </div>

                <div className="space-y-2">
                  <Label htmlFor="laycanDeliveryDate">Laycan / Delivery Date</Label>
                  <Popover>
                    <PopoverTrigger asChild>
                      <Button
                        variant="outline"
                        className="w-full justify-start text-left font-normal"
                      >
                        <CalendarIcon className="mr-2 h-4 w-4" />
                        {formData.laycanDeliveryDate ? (
                          format(formData.laycanDeliveryDate, "PPP")
                        ) : (
                          <span>Pick a date</span>
                        )}
                      </Button>
                    </PopoverTrigger>
                    <PopoverContent className="w-auto p-0">
                      <Calendar
                        mode="single"
                        selected={formData.laycanDeliveryDate}
                        onSelect={(date) => handleInputChange('laycanDeliveryDate', date)}
                        initialFocus
                      />
                    </PopoverContent>
                  </Popover>
                </div>

                <div className="space-y-2">
                  <Label htmlFor="budgetAmount">Budget Amount</Label>
                  <Input
                    id="budgetAmount"
                    type="number"
                    value={formData.budgetAmount}
                    onChange={(e) => handleInputChange('budgetAmount', e.target.value)}
                    placeholder="e.g., 25000"
                    min="0"
                  />
                </div>

                <div className="space-y-2">
                  <Label htmlFor="budgetUnit">Budget Unit</Label>
                  <Select 
                    value={formData.budgetUnit} 
                    onValueChange={(value) => handleInputChange('budgetUnit', value)}
                  >
                    <SelectTrigger>
                      <SelectValue placeholder="Select budget unit" />
                    </SelectTrigger>
                    <SelectContent>
                      {budgetUnits.map((unit) => (
                        <SelectItem key={unit} value={unit}>{unit}</SelectItem>
                      ))}
                    </SelectContent>
                  </Select>
                </div>
              </div>
            </div>

            {/* Freight Details */}
            <div className="space-y-6">
              <h3 className="text-xl font-semibold text-gray-800 border-b pb-2">
                Freight Details
              </h3>
              <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div className="space-y-2">
                  <Label htmlFor="portOfLoading">Port of Loading (POL)</Label>
                  <Input
                    id="portOfLoading"
                    value={formData.portOfLoading}
                    onChange={(e) => handleInputChange('portOfLoading', e.target.value)}
                    placeholder="e.g., Singapore, Rotterdam"
                    required
                  />
                </div>

                <div className="space-y-2">
                  <Label htmlFor="portOfDischarge">Port of Discharge (POD)</Label>
                  <Input
                    id="portOfDischarge"
                    value={formData.portOfDischarge}
                    onChange={(e) => handleInputChange('portOfDischarge', e.target.value)}
                    placeholder="e.g., Shanghai, Hamburg"
                    required
                  />
                </div>

                <div className="space-y-2">
                  <Label htmlFor="cargoType">Cargo Type</Label>
                  <Select 
                    value={formData.cargoType} 
                    onValueChange={(value) => handleInputChange('cargoType', value)}
                  >
                    <SelectTrigger>
                      <SelectValue placeholder="Select cargo type" />
                    </SelectTrigger>
                    <SelectContent>
                      {cargoTypes.map((type) => (
                        <SelectItem key={type} value={type}>{type}</SelectItem>
                      ))}
                    </SelectContent>
                  </Select>
                </div>

                <div className="space-y-2">
                  <Label htmlFor="cargoQuantity">Cargo Quantity</Label>
                  <Input
                    id="cargoQuantity"
                    type="number"
                    value={formData.cargoQuantity}
                    onChange={(e) => handleInputChange('cargoQuantity', e.target.value)}
                    placeholder="e.g., 25000"
                    min="0"
                    required
                  />
                </div>

                <div className="space-y-2">
                  <Label htmlFor="loadRate">Load Rate (MT/day)</Label>
                  <Input
                    id="loadRate"
                    type="number"
                    value={formData.loadRate}
                    onChange={(e) => handleInputChange('loadRate', e.target.value)}
                    placeholder="e.g., 5000"
                    min="0"
                  />
                </div>

                <div className="space-y-2">
                  <Label htmlFor="dischargeRate">Discharge Rate (MT/day)</Label>
                  <Input
                    id="dischargeRate"
                    type="number"
                    value={formData.dischargeRate}
                    onChange={(e) => handleInputChange('dischargeRate', e.target.value)}
                    placeholder="e.g., 5000"
                    min="0"
                  />
                </div>
              </div>
            </div>

            {/* Submit Button */}
            <div className="flex justify-center pt-6">
              <Button 
                type="submit" 
                className="px-8 py-3 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg"
                size="lg"
              >
                Submit Chartering Request
              </Button>
            </div>
          </form>
        </CardContent>
      </Card>
    </div>
  );
};

export default VesselCharteringForm;
