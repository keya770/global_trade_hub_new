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

interface SalePurchaseFormData {
  // Organisation Details
  organisationType: string;
  personCompanyName: string;
  phone: string;
  email: string;
  address: string;
  
  // Vessel Details
  shipType: string;
  vesselType: string;
  yearOfBuild: string;
  dwt: string;
  preferredBuildNation: string;
  budget: string;
  tradingArea: string;
  deliveryLocation: string;
  preferredTimeline: Date | undefined;
  
  // Transaction Details
  action: string;
}

const VesselSalePurchaseForm: React.FC = () => {
  const [formData, setFormData] = useState<SalePurchaseFormData>({
    organisationType: '',
    personCompanyName: '',
    phone: '',
    email: '',
    address: '',
    shipType: '',
    vesselType: '',
    yearOfBuild: '',
    dwt: '',
    preferredBuildNation: '',
    budget: '',
    tradingArea: '',
    deliveryLocation: '',
    preferredTimeline: undefined,
    action: '',
  });

  const handleInputChange = (field: keyof SalePurchaseFormData, value: string | Date | undefined) => {
    setFormData(prev => ({
      ...prev,
      [field]: value
    }));
  };

  const handleSubmit = (e: React.FormEvent) => {
    e.preventDefault();
    console.log('Sale & Purchase Form Data:', formData);
    // Handle form submission here
  };

  const organisationTypes = [
    'Ship Owner',
    'Ship Broker', 
    'Commodity Trader',
    'Other'
  ];

  const shipTypes = [
    'Newbuild',
    'Second-hand',
    'Scrap'
  ];

  const vesselTypes = [
    'Dry Bulk Carrier',
    'Tanker - CPP/DPP',
    'Tanker - Oil Products',
    'Tanker - Crude Oil',
    'Tanker - Bitumen',
    'Tanker - Bunkering',
    'LPG',
    'LNG',
    'Container',
    'Offshore',
    'Other'
  ];

  const buildNations = [
    'Japan',
    'South Korea',
    'China',
    'Germany',
    'Netherlands',
    'Italy',
    'Turkey',
    'India',
    'Other'
  ];

  const actions = [
    'Buy',
    'Purchase',
    'Sale'
  ];

  return (
    <div className="max-w-4xl mx-auto p-6">
      <Card className="shadow-lg">
        <CardHeader className="text-center">
          <CardTitle className="text-3xl font-bold text-gray-800">
            Vessel Sale & Purchase (S&P) Form
          </CardTitle>
          <p className="text-gray-600 mt-2">
            Submit your vessel sale or purchase requirements
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
                  <Label htmlFor="personCompanyName">Person/Company Name</Label>
                  <Input
                    id="personCompanyName"
                    value={formData.personCompanyName}
                    onChange={(e) => handleInputChange('personCompanyName', e.target.value)}
                    placeholder="Enter name or company name"
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

            {/* Vessel Details */}
            <div className="space-y-6">
              <h3 className="text-xl font-semibold text-gray-800 border-b pb-2">
                Vessel Details
              </h3>
              <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div className="space-y-2">
                  <Label htmlFor="shipType">Type of Ship</Label>
                  <Select 
                    value={formData.shipType} 
                    onValueChange={(value) => handleInputChange('shipType', value)}
                  >
                    <SelectTrigger>
                      <SelectValue placeholder="Select ship type" />
                    </SelectTrigger>
                    <SelectContent>
                      {shipTypes.map((type) => (
                        <SelectItem key={type} value={type}>{type}</SelectItem>
                      ))}
                    </SelectContent>
                  </Select>
                </div>

                <div className="space-y-2">
                  <Label htmlFor="vesselType">Vessel Type</Label>
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
                  <Label htmlFor="yearOfBuild">Year of Build</Label>
                  <Input
                    id="yearOfBuild"
                    type="number"
                    value={formData.yearOfBuild}
                    onChange={(e) => handleInputChange('yearOfBuild', e.target.value)}
                    placeholder="e.g., 2020"
                    min="1900"
                    max="2030"
                  />
                </div>

                <div className="space-y-2">
                  <Label htmlFor="dwt">DWT (Deadweight Tonnage)</Label>
                  <Input
                    id="dwt"
                    type="number"
                    value={formData.dwt}
                    onChange={(e) => handleInputChange('dwt', e.target.value)}
                    placeholder="e.g., 50000"
                    min="0"
                  />
                </div>

                <div className="space-y-2">
                  <Label htmlFor="preferredBuildNation">Preferred Build Nation</Label>
                  <Select 
                    value={formData.preferredBuildNation} 
                    onValueChange={(value) => handleInputChange('preferredBuildNation', value)}
                  >
                    <SelectTrigger>
                      <SelectValue placeholder="Select build nation" />
                    </SelectTrigger>
                    <SelectContent>
                      {buildNations.map((nation) => (
                        <SelectItem key={nation} value={nation}>{nation}</SelectItem>
                      ))}
                    </SelectContent>
                  </Select>
                </div>

                <div className="space-y-2">
                  <Label htmlFor="budget">Budget (USD)</Label>
                  <Input
                    id="budget"
                    type="number"
                    value={formData.budget}
                    onChange={(e) => handleInputChange('budget', e.target.value)}
                    placeholder="e.g., 25000000"
                    min="0"
                  />
                </div>

                <div className="space-y-2">
                  <Label htmlFor="tradingArea">Trading Area</Label>
                  <Input
                    id="tradingArea"
                    value={formData.tradingArea}
                    onChange={(e) => handleInputChange('tradingArea', e.target.value)}
                    placeholder="e.g., Mediterranean, Asia-Pacific"
                  />
                </div>

                <div className="space-y-2">
                  <Label htmlFor="deliveryLocation">Delivery Location</Label>
                  <Input
                    id="deliveryLocation"
                    value={formData.deliveryLocation}
                    onChange={(e) => handleInputChange('deliveryLocation', e.target.value)}
                    placeholder="e.g., Singapore, Rotterdam"
                  />
                </div>

                <div className="space-y-2">
                  <Label htmlFor="preferredTimeline">Preferred Timeline</Label>
                  <Popover>
                    <PopoverTrigger asChild>
                      <Button
                        variant="outline"
                        className="w-full justify-start text-left font-normal"
                      >
                        <CalendarIcon className="mr-2 h-4 w-4" />
                        {formData.preferredTimeline ? (
                          format(formData.preferredTimeline, "PPP")
                        ) : (
                          <span>Pick a date</span>
                        )}
                      </Button>
                    </PopoverTrigger>
                    <PopoverContent className="w-auto p-0">
                      <Calendar
                        mode="single"
                        selected={formData.preferredTimeline}
                        onSelect={(date) => handleInputChange('preferredTimeline', date)}
                        initialFocus
                      />
                    </PopoverContent>
                  </Popover>
                </div>
              </div>
            </div>

            {/* Transaction Details */}
            <div className="space-y-6">
              <h3 className="text-xl font-semibold text-gray-800 border-b pb-2">
                Transaction Details
              </h3>
              <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div className="space-y-2">
                  <Label htmlFor="action">Action</Label>
                  <Select 
                    value={formData.action} 
                    onValueChange={(value) => handleInputChange('action', value)}
                  >
                    <SelectTrigger>
                      <SelectValue placeholder="Select action" />
                    </SelectTrigger>
                    <SelectContent>
                      {actions.map((action) => (
                        <SelectItem key={action} value={action}>{action}</SelectItem>
                      ))}
                    </SelectContent>
                  </Select>
                </div>
              </div>
            </div>

            {/* Submit Button */}
            <div className="flex justify-center pt-6">
              <Button 
                type="submit" 
                className="px-8 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg"
                size="lg"
              >
                Submit Sale & Purchase Request
              </Button>
            </div>
          </form>
        </CardContent>
      </Card>
    </div>
  );
};

export default VesselSalePurchaseForm;
